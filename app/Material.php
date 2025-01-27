<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productmodel','builtyear','description','price','user_id','brand_id','category_id'
    ];

    /**
     * Get the brands related to that material. //! avant j'avais marqué function brands() au pluriel
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


    /**
     * Get the category that owns the material.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the user (only one) that owns the material.
     */
    public function user()
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
