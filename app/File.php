<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class File extends Model
{
     protected $guarded = [];
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
