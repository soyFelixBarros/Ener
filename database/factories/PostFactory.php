<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
    	'province_code' => function () {
    		return factory(App\Province::class)->create()->code;
    	},
    	'newspaper_id' => function () {
    		return factory(App\Newspaper::class)->create()->id;
    	},
    	'category_id' => function () {
    		return factory(App\Category::class)->create()->id;
    	},
        'title' => $faker->sentence,
        'summary' => $faker->paragraph,
        'url' => $faker->url
    ];
});
