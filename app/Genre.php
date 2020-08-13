<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Genre extends Model
{
    protected $collection = 'genres';
    protected $connection = 'mongodb';

    protected $fillable   = [
        'name', 'coverImage', 'filterColor', 'slug',
    ];

    public function musics()
    {
        return $this->belongsToMany(Music::class, null, 'genre', 'musics');
    }
    public function channels()
    {
        return $this->belongsToMany(Channel::class, null, 'genre', 'channels');
    }
}
