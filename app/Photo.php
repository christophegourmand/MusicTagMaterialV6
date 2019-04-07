<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * Get the material that owns the photos.
     */
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
