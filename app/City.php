<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Get the country that owns the city.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the addresses attributed to that City 
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}
