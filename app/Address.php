<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'city_id'
    ];
    
    /**
     * Get the city that owns the address.
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * Get the users.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
