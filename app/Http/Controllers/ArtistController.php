<?php

namespace App\Http\Controllers;

use App\Artist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ArtistController extends Controller
{

    public function index()
    {
        $artists = Artist::latest()->paginate(5);
        return view('artist.index', compact('artists'));

    }



    public function create()
    {

        return view('artist.create');

    }

    // artist add
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'des' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sex' => 'required',

        ]);
        // updlode image
        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";


        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->bio = $request->input('des');
        $artist->sex = $request->input('sex');
        $artist->avatar = $url_cover_image;
        $artist->save();
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

    }
    // form edite
    public function edit($id)
    {

        $edite = true;
        $artists = Artist::find($id);
        return view('artist.edit', compact('artists', 'edite'));
    }

    // artist edite
    public function update(Request $request,$id)
    {

        $validate = $request->validate([
            'name' => 'required',
            'des' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sex' => 'required',
            'artist_id'=>'required'

        ]);

        if($request->img != null){
        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";}


        $artist = Artist::find($request->artist_id);
        $artist->name = $request->input('name');
        $artist->bio = $request->input('des');
        $artist->sex = $request->input('sex');
        if($request->img != null){$artist->avatar = $url_cover_image;}
        $artist->save();
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ویرایش شد ‌‌');

    }

}
