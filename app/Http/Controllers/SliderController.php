<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Music;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $music = Music::all();
        $album = Album::all();
        $artist = Artist::all();

        return view('slider.create', compact('music', 'album', 'artist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
        ]);
        $id = "";
        $link = "";
        $type = "";
        // چک کردن برای فقط بک دانه ست شده باشد
        if ($request->music != null & $request->album == null & $request->artist == null & $request->link == null) {
            $id = $request->music;
            $type = 'music';
        }
        // album
        if ($request->album != null & $request->music == null & $request->artist == null & $request->link == null) {
            $id = $request->album;
            $type = "album";
        }
        // artist
        if ($request->artist != null & $request->album == null & $request->music == null & $request->link == null) {
            $id = $request->artist;
            $type = "artist";
        }
        // link
        if ($request->link != null & $request->album == null & $request->artist == null & $request->music == null) {
            $link = $request->link;
        }
        // all null
        if ($request->music == null & $request->album == null & $request->artist == null & $request->link == null) {

            return redirect()->back()->with('message3', 'انتخاب یک فیلد اجباری است  ');
        }

        if ($id == null & $link == null) {
            return redirect()->back()->with('message2', 'انتخاب یک فیلد فقط ممکن است  ');
        }

        $slider = new Slider();
        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file('image')->extension();
        $request->file('image')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";
        $request->merge(['images' => $url_cover_image]);
        $slider = $slider->create($request->except('music', 'artist', 'album'));
// اضافه کردن رابطه به اسلایدر
        if ($id != null) {
            if ($type == "music") {
                $slider->artist()->attach("");
                $slider->album()->attach("");
                $slider->music()->attach($id);}
            if ($type == "album") {
                $slider->artist()->attach("");
                $slider->music()->attach("");
                $slider->album()->attach($id);}
            if ($type == "artist") {
                $slider->album()->attach("");
                $slider->music()->attach("");
                $slider->artist()->attach($id);}
        }

        return redirect()->back()->with('message', 'با موفقیت ثبت شد‌‌');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = Music::all();
        $album = Album::all();
        $artist = Artist::all();

        $slide = Slider::find($id);
        return view('slider.edit', compact('slide', 'id', 'music', 'album', 'artist'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'isactive' => 'required',
            'image' => 'image|max:2048',
        ]);

        $slider = Slider::find($id);
        // چک کردن رکوئست برای وجود عکس برای اپدیت یا ثبت عکس قبلی
        if ($request->file('image') != null) {
            $url = "5f25373f5b38800011667535.liara.space";
            $uuid = Str::uuid();
            $extension_file = $request->file('image')->extension();
            $request->file('image')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";} else {

            $url_cover_image = $slider->images;
        }

        $editid = "";
        $link = "";
        $type = "";
        // چک کردن برای فقط بک دانه ست شده باشد
        if ($request->music != null & $request->album == null & $request->artist == null & $request->link == null) {
            $editid = $request->music;
            $type = 'music';
        }
        // album
        if ($request->album != null & $request->music == null & $request->artist == null & $request->link == null) {
            $editid = $request->album;
            $type = "album";
        }
        // artist
        if ($request->artist != null & $request->album == null & $request->music == null & $request->link == null) {
            $editid = $request->artist;
            $type = "artist";
        }
        // link
        if ($request->link != null & $request->album == null & $request->artist == null & $request->music == null) {
            $link = $request->link;
        }
        // all null
        if ($request->music == null & $request->album == null & $request->artist == null & $request->link == null) {

            return redirect()->back()->with('message3', 'انتخاب یک فیلد اجباری است  ');
        }

        if ($editid == null & $link == null) {
            return redirect()->back()->with('message2', 'انتخاب یک فیلد فقط ممکن است  ');
        }

        $slider = Slider::find($id);
        $request->merge(['images' => $url_cover_image]);
        $slider->update($request->except('music', 'artist', 'album'));

// حذف رابطه های دیگر و اضافه کردن رابطه جدید و جلوگیری از ثبت چند رابطه
        if ($editid != null) {
            if ($type == "music") {
                $slider->link = "";
                $slider->save();
                $slider->unset('album');
                $slider->unset('artist');
                $slider->unset('music');
                $slider->artist()->attach("");
                $slider->album()->attach("");
                $slider->music()->attach($editid);
            }
            if ($type == "album") {

                $slider->link = "";
                $slider->save();
                $slider->unset('album');
                $slider->unset('artist');
                $slider->unset('music');
                $slider->artist()->attach("");
                $slider->music()->attach("");
                $slider->album()->attach($editid);

            }
            if ($type == "artist") {
                $slider->link = "";
                $slider->save();
                $slider->unset('album');
                $slider->unset('artist');
                $slider->unset('music');
                $slider->music()->attach("");
                $slider->album()->attach("");
                $slider->artist()->attach($editid);
            }
        }

        return redirect()->back()->with('message', 'با موفقیت ویرایش شد‌‌');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
