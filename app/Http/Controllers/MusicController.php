<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Genre;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MusicController extends Controller
{



// list music
public function index()
{
    $musics = Music::latest()->paginate(5);
    return view('music.index', compact('musics'));
}
    public function create()
    {

        $artists = Artist::all();
        $genres = Genre::all();
        $albums = Album::all();
        return view('music.create', compact('artists', 'genres', 'albums'));

    }


    // music add
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'data' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'music' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'genre' => 'required',
            'album' => 'required',
            'artist' => 'required',

        ]);

        $url = "5f25373f5b38800011667535.liara.space";
        // اضافه کردن عکس
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        // اضافه کردن اهنگ
        $uuid_music = Str::uuid();
        $extension_file_music = $request->file('music')->extension();
        $request->file('music')->storeAs($url . '/' . 'sounds', $uuid_music . '.' . $extension_file_music, 's3');
        $url_music = "/sounds/$uuid_music.$extension_file_music";

        $music = new Music(['name' => $request->name, 'color' => $request->color, 'releasedata' => $request->data, 'coverImage' => $url_cover_image, 'audioLink' => $url_music, 'likes' => 0, 'views' => 0]);
        $genre = Genre::find($request->genre);
        $album = Album::find($request->album);
        $artist = Artist::find($request->artist);
        $artist->musics()->save($music);
        $genre->musics()->save($music);
        $album->musics()->save($music);
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

    }

    // music form edite
    public function edit($id)
    {
        $edite = true;
        $music = Music::find($id);
        $artists = Artist::all();
        $genres = Genre::all();
        $albums = Album::all();

        return view('music.edit', compact('music', 'artists', 'genres', 'albums', 'edite'));
    }
    //music edite
    public function update(Request $request,$id)
    {

        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'data' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'music' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'genre' => 'required',
            'album' => 'required',
            'artist' => 'required',

        ]);

        // گرفتن ایدی های رابطه برای ویرایش
        $music_id = $request->music_id;
        $music = Music::find($music_id);
        $artists = $music->artists;
        $genres = $music->genres;
        $albums = $music->albums;

        $url = "5f25373f5b38800011667535.liara.space";
        // اضافه کردن عکس
        if ($request->img != null) {
            $uuid = Str::uuid();
            $extension_file = $request->file('img')->extension();
            $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";
                                   }
        // اضافه کردن اهنگ
        if ($request->musicfile != null) {
            $uuid_music = Str::uuid();
            $extension_file_music = $request->file('musicfile')->extension();
            $request->file('music')->storeAs($url . '/' . 'sounds', $uuid_music . '.' . $extension_file_music, 's3');
            $url_music = "/sounds/$uuid_music.$extension_file_music";}



        $music->name = $request->name;
        $music->releasedata = $request->data;
        if ($request->img != null) {$music->coverImage = $url_cover_image;}
        $music->color = $request->color;
        if ($request->musicfile != null) {$music->audioLink = $url_music;}
        $music->save();

// detche

        foreach ($artists as $artist) {
            $music->artists()->detach($artist->_id);
        }
        foreach ($genres as $genre) {
            $music->genres()->detach($genre->_id);

        }
        foreach ($albums as $album) {
            $music->albums()->detach($album->_id);

        }
// atach
        $music->artists()->attach($request->artist);
        $music->genres()->attach($request->genre);
        $music->albums()->attach($request->album);

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ویرایش شد ‌‌');


}
}
