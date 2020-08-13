<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Artist extends Model {
	protected $fillable = [
		'name', 'avatar', 'biography','bio','sex'
	];

	protected $hidden = [
		'created_at', 'updated_at',
	];

	public function singerOf() {
		return $this->belongsToMany(Music::class, null, 'singer', 'singerOf');
	}

	public function writerOf() {
		return $this->belongsToMany(Music::class, null, 'songwriter', 'songwriterOf');
	}

	public function composerOf(){
		return $this->belongsToMany(Music::class, null, 'composer', 'composerOf');
	}

	public function albums() {
		return $this->belongsToMany(Album::class, null, 'artists', 'albums');
	}
     public function musics() {
		return $this->belongsToMany(Music::class, null, 'artists', 'music');
    }

    public function slider()
    {
        return $this->belongsToMany(Slider::class, null, 'artist', 'slider');
    }
}
