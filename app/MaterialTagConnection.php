<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialTagConnection extends Model
{
    /**
     * Get the tags related to that material.
     */
    public function tags()
    {
        return $this->belongsTo('App\Tag');
    }
    
    
    /**
     * Get the materials related to that tag.
     */
    public function materials()
    {
        return $this->belongsTo('App\Material');
    }
}
