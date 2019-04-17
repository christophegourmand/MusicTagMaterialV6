<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'videolink','description','material_id'
    ];

    /**
     * Get the material that owns the audios.
     */
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
