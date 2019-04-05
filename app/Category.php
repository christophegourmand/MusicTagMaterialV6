<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * Get the material having that category.
     */
    public function materials()
    {
        return $this->hasMany('App\Material');
    }
}
