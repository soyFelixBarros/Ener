<?php

$factory->define(App\Scraper::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'src' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'content' => $faker->sentence($nbWords = 5, $variableNbWords = true),
    ];
});