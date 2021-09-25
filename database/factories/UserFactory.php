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
        'name' => $faker->name,
        'address' => $faker->address,
        'gender' => $faker->randomElement(['male','female']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'Very secure password lol', // password
        'image' => 'imgs/profilePics/ProfPic (' . rand(1,8) . ').PNG',
        'about' => $faker->realText,
        'remember_token' => Str::random(10),
    ];
});
