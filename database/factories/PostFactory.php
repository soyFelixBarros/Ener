<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
    	'source_id' => function () {
    		return factory(App\Source::class)->create()->id;
    	},
        'title' => $faker->sentence,
        'text' => $faker->paragraph,
        'url' => $faker->url
    ];
});
