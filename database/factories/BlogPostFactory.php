<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\BlogPosts;
use Faker\Generator as Faker;


$factory->define(BlogPosts::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
        'image' =>  $faker->image('public/storage/blogimages',640,480, null, false),
        'user_id' => factory(App\Models\User::class)
    ];
});
