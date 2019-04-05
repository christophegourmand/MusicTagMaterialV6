<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
     * Get the material that owns the audios.
     */
    public function materials()
    {
        return $this->belongsTo('App\Material');
    }
}