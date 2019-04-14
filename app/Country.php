<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'flagicon'
    ];


    /**
     * Get the cities attributed to that country
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
