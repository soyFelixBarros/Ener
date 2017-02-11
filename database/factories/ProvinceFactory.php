<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Province::class, function (Faker\Generator $faker) {
    
    $code = $faker->countryCode . '-' . $faker->stateAbbr;
    
    return [
    	'country_code' => function () {
    		return factory(App\Country::class)->create()->code;
    	},
    	'code' => $code,
        'name' => $faker->city,
    ];
});