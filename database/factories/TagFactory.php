<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name), 
    ];
});