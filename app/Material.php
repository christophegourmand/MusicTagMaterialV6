<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    /**
     * Get the brands related to that material.
     */
    public function brands()
    {
        return $this->belongsTo('App\Brand');
    }


    /**
     * Get the category that owns the material.
     */
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the user (only one) that owns the material.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the tags attributed to that material
     */
    public function tags()
    {
        return $this->hasMany('App\MaterialTagConnection');
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
