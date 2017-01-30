<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
    	'newspaper_id' => function () {
    		return factory(App\Newspaper::class)->create()->id;
    	},
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'summary' => $faker->paragraph
    ];
});
