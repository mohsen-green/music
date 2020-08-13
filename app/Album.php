<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;


use Jenssegers\Mongodb\Eloquent\Model;

class Album extends Model
{
    //id*	string    //name*	string  //coverImage*	string   //musics*	[...]    //artists*	[...]    //updatedAt	string
    protected $fillable = ['name','coverImage', 'releaseDate'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function musics()
    {
        return $this->belongsToMany(Genre::class, null,'album', 'musics');
    }
    public function artist()
    {
        return $this->belongsToMany(Artist::class, null,'albums', 'artists');


    }

    public function slider()
    {
        return $this->belongsToMany(Slider::class, null, 'album', 'slider');
    }
}
//
