<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,DB::table('users')->max('id')),
        'title' => $faker->catchPhrase,
        // 'body' => $faker->text, // Lorem
        'body' => $faker->realText, // random actual words
        // 'image_path' => $faker->randomElement([]),
    ];
});
