<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'archived_at' => Carbon::now()->addWeek(),
        'published_at' => Carbon::now()->subWeek(),
    ];
});
