<?php

$factory->define(App\Province::class, function (Faker\Generator $faker) {
	$country = factory(App\Country::class)->create();
    
    return [
    	'country_id' => $country->id,
    	'code' => $country->code.'-'.$faker->unique()->stateAbbr,
        'name' => $faker->city,
    ];
});