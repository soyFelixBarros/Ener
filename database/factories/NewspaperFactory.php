<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Newspaper::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'website' => $faker->domainName 
    ];
});