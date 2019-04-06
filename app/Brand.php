<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Get the tags attributed to that material
     */
    public function materials()
    {
        return $this->hasMany('App\MaterialBrandConnection');
    }
}
