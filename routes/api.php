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