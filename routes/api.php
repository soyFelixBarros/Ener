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

// Link
Route::group(['prefix' => 'link', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'LinkController@all');
	$this->post('/', 'LinkController@store');
	$this->get('/{id}', 'LinkController@find');
	$this->put('/{id}', 'LinkController@update');
	$this->delete('/{id}', 'LinkController@destroy');
});

// Country
Route::group(['prefix' => 'country', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'CountryController@all');
	$this->post('/', 'CountryController@store');
	$this->get('/{id}', 'CountryController@find');
	$this->put('/{id}', 'CountryController@update');
	$this->delete('/{id}', 'CountryController@destroy');
});

// Province
Route::group(['prefix' => 'province', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'ProvinceController@all');
	$this->post('/', 'ProvinceController@store');
	$this->get('/{id}', 'ProvinceController@find');
	$this->put('/{id}', 'ProvinceController@update');
	$this->delete('/{id}', 'ProvinceController@destroy');
});

// Tag
Route::group(['prefix' => 'tag', 'namespace' => 'Api\v1'], function ($this) {
	$this->get('/', 'TagController@all');
	$this->post('/', 'TagController@store');
	$this->get('/{id}', 'TagController@find');
	$this->put('/{id}', 'TagController@update');
	$this->delete('/{id}', 'TagController@destroy');
});