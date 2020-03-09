<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Material::class , 1)->create();
        factory(\App\Size::class , 1)->create();
        factory(\App\User::class , 5)->create();
        factory(\App\Discount::class , 1)->create();
    }
}
