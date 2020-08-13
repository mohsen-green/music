<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name', 'coverImage','data','description', 'bgColor'];
    protected $hidden   = [
        'created_at', 'updated_at',
    ];

    public function musics()
    {
        return $this->belongsToMany(Music::class, null, 'channels', 'musics');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, null, 'channels', 'genres');
    }

}
