<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * Get the material that owns the photos.
     */
    public function materials()
    {
        return $this->belongsTo('App\Material');
    }
}
