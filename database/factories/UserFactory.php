<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => 'حسین',
        'last_name' => 'مولوی',
        'username' => $faker->userName,
        'phone' => $faker->phoneNumber,
        'type' => 'super admin' ,
        'password' => bcrypt('123456789'), // password
        'api_token' => Str::random(256),
        'address' => $faker->address
    ];
});
