<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'zipcode', 'country_id'
    ];


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
