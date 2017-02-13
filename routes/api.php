<?php

use Illuminate\Http\Request;

// User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Post
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/posts', 'PostController@all');
	$this->post('/post', 'PostController@store');
	$this->get('/post/{id?}', 'PostController@find');
	$this->put('/post/{id}', 'Postcontroller@update');
	$this->delete('/post/{id}', 'PostController@destroy');
});

// Newspaper
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/newspapers', 'NewspaperController@all');
	$this->post('/newspaper', 'NewspaperController@store');
	$this->get('/newspaper/{id?}', 'NewspaperController@find');
	$this->put('/newspaper/{id}', 'NewspaperController@update');
	$this->delete('/newspaper/{id}', 'NewspaperController@destroy');
});

// Link
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/links', 'LinkController@all');
	$this->post('/link', 'LinkController@store');
	$this->get('/link/{id?}', 'LinkController@find');
	$this->put('/link/{id}', 'LinkController@update');
	$this->delete('/link/{id}', 'LinkController@destroy');
});

// Country
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/countries', 'CountryController@all');
	$this->post('/country', 'CountryController@store');
	$this->get('/country/{id?}', 'CountryController@find');
	$this->put('/country/{id}', 'CountryController@update');
	$this->delete('/country/{id}', 'CountryController@destroy');
});

// Province
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/provinces', 'ProvinceController@all');
	$this->post('/province', 'ProvinceController@store');
	$this->get('/province/{id?}', 'ProvinceController@find');
	$this->put('/province/{id}', 'ProvinceController@update');
	$this->delete('/province/{id}', 'ProvinceController@destroy');
});

// Tag
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/tags', 'TagController@all');
	$this->post('/tag', 'TagController@store');
	$this->get('/tag/{id?}', 'TagController@find');
	$this->put('/tag/{id}', 'TagController@update');
	$this->delete('/tag/{id}', 'TagController@destroy');
});

// Search
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/search/posts', 'SearchController@posts');
});