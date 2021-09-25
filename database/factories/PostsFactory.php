<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,DB::table('users')->max('id')),
        'title' => $faker->catchPhrase,
        // 'title' => $faker->sentence(3), // Another way to generate titles, uses lorem
        // 'body' => $faker->text, // Lorem
        'body' => $faker->realText, // random actual words
        // 'category' => $faker->randomElement(['Anime', 'Programming', 'Games', 'Paradoxes', 'Existential crisis', 'Derealization', 'Emotional problems']),
        'image' => $faker->randomElement([
            'http://lorempixel.com/600/600/cats', 'http://lorempixel.com/600/600/nature', 'http://lorempixel.com/600/600/food'
            // NULL
        ]),
    ];
});
