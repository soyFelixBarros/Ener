<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Taggable::class, function (Faker\Generator $faker) {
    return [
    	'tag_id' => function () {
    		return factory(App\Tag::class)->create()->id;
    	},
        'taggable_id' => function () {
        	return factory(App\Post::class)->create()->id;
        },
        'taggable_type' => 'App\Post',
    ];
});