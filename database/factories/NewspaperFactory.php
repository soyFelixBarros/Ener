<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Newspaper::class, function (Faker\Generator $faker) {
    return [
    	'province_id' =>  function () {
    		return factory(App\Province::class)->create()->id;
    	},
        'name' => $faker->name,
        'website' => $faker->domainName 
    ];
});