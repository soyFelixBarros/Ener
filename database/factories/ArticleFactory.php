<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
    	'newspaper_id' => function () {
    		return factory(App\Newspaper::class)->create()->id;
    	},
        'title' => $faker->sentence,
        'summary' => $faker->paragraph
    ];
});
