<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exclusive_discount;
use Faker\Generator as Faker;

$factory->define(Exclusive_discount::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(20 , 90) ,
        'user_id' => $faker->numberBetween(1 ,5)
    ];
});
