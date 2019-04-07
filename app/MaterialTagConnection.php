<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialTagConnection extends Model
{
    /**
     * Get the tags related to that material.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    
    
    /**
     * Get the materials related to that tag.
     */
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
