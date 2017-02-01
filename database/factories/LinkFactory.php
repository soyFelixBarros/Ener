<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->url,
        'active' => $faker->boolean
    ];
});