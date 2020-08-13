<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;



class Slider extends Model
{
    protected $collection = 'sliders';
    protected $fillable = ['title','images','link','model_item_id','type','isactive'];

    public function music()
    {
        return $this->belongsToMany(Music::class, null, 'slider', 'music');
    }
    public function artist()
    {
        return $this->belongsToMany(Artist::class, null, 'slider', 'artist');
    }
    public function album()
    {
        return $this->belongsToMany(Album::class, null, 'slider', 'album');
    }

}
