<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Get the city that owns the address.
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
