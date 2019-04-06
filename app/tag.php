<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    /**
     * Get the tags attributed to that material
     */
    public function materials()
    {
        return $this->hasMany('App\MaterialTagConnection');
    }
}
