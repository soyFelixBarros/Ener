<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Province::class, function (Faker\Generator $faker) {
    return [
    	'country_id' => function () {
    		return factory(App\Country::class)->create()->id;
    	},
        'name' => $faker->city,
    ];
});