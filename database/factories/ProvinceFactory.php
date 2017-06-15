<?php

$factory->define(App\Province::class, function (Faker\Generator $faker) {
    
    // $code = $faker->countryCode . '-' . $faker->stateAbbr;
    $country_code = factory(App\Country::class)->create()->code;
    
    return [
    	'country_code' => $country_code,
    	'code' => $country_code.'-'.$faker->unique()->stateAbbr,
        'name' => $faker->city,
    ];
});