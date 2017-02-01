<?php

use Illuminate\Http\Request;

// User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Post
Route::group(['prefix' => 'post', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'PostController@all');
	$this->post('/', 'PostController@store');
	$this->get('/{id}', 'PostController@find');
	$this->put('/{id}', 'Postcontroller@update');
	$this->delete('/{id}', 'PostController@destroy');
});

// Newspaper
Route::group(['prefix' => 'newspaper', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'NewspaperController@all');
	$this->post('/', 'NewspaperController@store');
	$this->get('/{id}', 'NewspaperController@find');
	$this->put('/{id}', 'NewspaperController@update');
	$this->delete('/{id}', 'NewspaperController@destroy');
});