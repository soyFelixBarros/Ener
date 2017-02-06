<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->countryCode,
        'name' => $faker->country,
    ];
});