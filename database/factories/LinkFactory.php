<?php

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
    	'newspaper_id' => function () {
    		return factory(App\Newspaper::class)->create()->id;
    	},
    	'category_id' => function () {
    		return factory(App\Category::class)->create()->id;
    	},
        'url' => $faker->url
    ];
});