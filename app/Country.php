<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get the cities attributed to that country
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
