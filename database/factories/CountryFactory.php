<?php

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->unique()->countryCode,
        'name' => $faker->country,
    ];
});