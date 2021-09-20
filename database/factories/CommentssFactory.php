<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,DB::table('users')->max('id')),
        'post_id' => rand(1,DB::table('posts')->max('id')),
        'body' => $faker->text, // Lorem
        // 'body' => $faker->realText, // random actual words
    ];
});
