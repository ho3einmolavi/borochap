<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'name' => 'تحریر 70' ,
        'type' => 'تحریر' ,
        'turning_number' => 0.9
    ];
});
