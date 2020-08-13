<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{

//  show form  for add album
    public function index()
    {
        $albums = Album::latest()->paginate(5);

        return view('album.index', compact('albums'));

    }

    // show all_album list
    public function create()
    {
        $albums = Album::all();
        $artists = Artist::all();

        return view('album.create', compact('albums', 'artists'));
    }

    // album add
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'name_artist' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        $artist = Artist::find($request->input('name_artist'));
        $album = new Album(['name' => $request->input('name'), 'coverImage' => $url_cover_image]);
        $artist->albums()->save(
            $album
        );
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

    }

    //form edit
    public function edit($id)
    {
        $edite = true;
        $albumsedite = Album::find($id);
        $artists = Artist::all();

        return view('album.edit', compact('albumsedite', 'artists', 'edite'));

    }
// edit album
    public function update(Request $request,$id)
    {


        $validate = $request->validate([
            'name' => 'required',
            'name_artist' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $id = $id;
        $album = Album::find($id);
        $artists = $album->artists;

        if ($request->img != null) {
            $url = "5f25373f5b38800011667535.liara.space";
            $uuid = Str::uuid();
            $extension_file = $request->file('img')->extension();
            $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";
        }

        $album->name = $request->input('name');
        if ($request->img != null) {$album->coverImage = $url_cover_image;}
        $album->save();
// deatch artist
        foreach ($artists as $artist) {
            $album->artist()->detach($artist);

        }
//aetch
        $album->artist()->attach($request->name_artist);

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ویرایش شد ‌‌');

     }

}
