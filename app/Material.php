<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $guarded = [];
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

}
