<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * Get the category that owns the material.
     */
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the photos for that material.
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    /**
     * Get the audios for that material.
     */
    public function audios()
    {
        return $this->hasMany('App\Audio');
    }
    
    /**
     * Get the videos for that material.
     */
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

}
