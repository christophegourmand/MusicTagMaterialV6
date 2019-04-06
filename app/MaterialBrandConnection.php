<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialBrandConnection extends Model
{
    /**
     * Get the brands related to that material.
     */
    public function brands()
    {
        return $this->belongsTo('App\brands');
    }
    
    
    /**
     * Get the materials related to that tag.
     */
    public function materials()
    {
        return $this->belongsTo('App\Material');
    }
}
