<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exclusive_discount extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
