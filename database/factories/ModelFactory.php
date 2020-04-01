<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'role_id' => rand(1, 2),
        'is_active' => rand(0, 1),
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'photo_id' => rand(1, 5),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 10),
        'category_id' => 1,
        'photo_id' => rand(1, 5),
        'title' => $faker->sentence(7, 11),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['administrator', 'author', 'subscriber']),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'Programming', 'JavaScript', 'Life', 'Travel','Coffee', 'Money', 'Women', 'Men', 'Love' ]),
    ];
});


$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file'=> 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id'=> $faker->numberBetween(1,10),
        'is_active'=> 1,
        'author'=> $faker->name,
        'photo'=> 'placeholder.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});



$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'is_active'=> 1,
        'author'=> $faker->name,
        'photo'=> 'placeholder.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});