<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'brand_id'
    ];

    //? here not obliged to declare the table name, as Laravel will search entity 'Brand' in table 'brands' with 's' automatically.

    /**
     * Get the materials attributed to that brand
     */
    public function materials()
    {
        return $this->hasMany('App\Material');
    }

}
