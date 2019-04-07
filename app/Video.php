<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the material that owns the videos.
     */
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
