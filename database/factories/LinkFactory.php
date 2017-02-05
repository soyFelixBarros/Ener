<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
    	'newspaper_id' => function () {
    		return factory(App\Newspaper::class)->create()->id;
    	}, 
        'url' => $faker->url,
        'active' => $faker->boolean
    ];
});