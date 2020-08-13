<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenreController extends Controller
{

    public function index()
    {

        $genres = Genre::latest()->paginate(5);
        return view('genre.index', compact('genres'));
    }
    //    genres
    public function create(){
         return view('genre.create');

    }

    //    add genre

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:20|unique:genres',
            'slug' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file->extension();
        $request->file('file')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        $genre = new Genre();
        $genre->name = $request->input('name');
        $genre->slug = $request->input('slug');
        $genre->filterColor = "#E1593B";
        $genre->coverImage = $url_cover_image;
        $genre->save();
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // نمایش ژانر برای ویرایش

            $genre = Genre::find($id);
            return view('genre.edit', compact('genre'));

    }

    // edite genre
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:20|unique:genres,genres.name',
            'slug' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
// check request file
        if ($request->file != null) {
            $url = "5f25373f5b38800011667535.liara.space";
            $uuid = Str::uuid();
            $extension_file = $request->file->extension();
            $request->file('file')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";

        }

        $genres = Genre::find($id);
        $genres->name = $request->input('name');
        $genres->slug = $request->input('slug');
        $genres->filterColor = "#E1593B";
        if ($request->file != null) {$genres->coverImage = $url_cover_image;}
        $genres->save();
        return redirect()->back()->with('message', '  با موفقیت ویرایش شد ‌‌');
    }

    public function destroy($id)
    {
        //
    }
}
