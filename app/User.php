<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{   use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function pays()
    {
        return $this->hasMany(Pay::class);
    }

    public function exclusiveDiscount()
    {
        return $this->hasOne(Exclusive_discount::class);
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }
}
