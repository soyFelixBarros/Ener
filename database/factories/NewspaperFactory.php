<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Newspaper::class, function (Faker\Generator $faker) {
    return [
    	'province_code' =>  function () {
    		return factory(App\Province::class)->create()->code;
    	},
        'name' => $faker->name,
        'website' => $faker->domainName 
    ];
});