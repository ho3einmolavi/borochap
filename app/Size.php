<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = [];
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}
