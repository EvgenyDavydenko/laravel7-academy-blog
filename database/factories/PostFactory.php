<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $content = $faker->realText(rand(200, 300));
    $time = $faker->dateTimeBetween('-30 days', '-1 days');

    return [
        'title' => $faker->realText(rand(20, 50)),
        'anons' => mb_substr($content, 0, 100) . '...',
        'content' => $content,
        'author_id' => rand(1, 4),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
