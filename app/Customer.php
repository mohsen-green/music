<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [ 'name', 'email', 'phone', 'avatar' ]; //password
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function channels()
    {
        return $this->belongsToMany(Genre::class, null,'customers', 'followedChannels');
    }

    public function playlists()
    {
        return $this->belongsToMany(Music::class, null,'customers', 'playlists');
    }
}
