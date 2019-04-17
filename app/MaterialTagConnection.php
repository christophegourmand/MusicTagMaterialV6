<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialTagConnection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id', 'material_id'
    ];

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
