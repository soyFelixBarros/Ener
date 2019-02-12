<?php

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
    	'newspaper_id' => function () {
    		return factory(App\Source::class)->create()->id;
    	},
        'url' => $faker->url
    ];
});