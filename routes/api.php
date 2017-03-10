<?php

use Illuminate\Http\Request;

// User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Articles
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/articles', 'ArticlesController@all');
	$this->post('/articles', 'ArticlesController@store');
	$this->get('/articles/{id?}', 'ArticlesController@find');
	$this->put('/articles/{id}', 'Articlescontroller@update');
	$this->delete('/articles/{id}', 'ArticlesController@destroy');
});

// Newspapers
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/newspapers', 'NewspaperController@all');
	$this->post('/newspaper', 'NewspaperController@store');
	$this->get('/newspaper/{id?}', 'NewspaperController@find');
	$this->put('/newspaper/{id}', 'NewspaperController@update');
	$this->delete('/newspaper/{id}', 'NewspaperController@destroy');
});

// Links
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/links', 'LinksController@all');
	$this->post('/links', 'LinksController@store');
	$this->get('/link/{id?}', 'LinksController@find');
	$this->put('/link/{id}', 'LinksController@update');
	$this->delete('/link/{id}', 'LinksController@destroy');
});

// Countries
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/countries', 'CountryController@all');
	$this->post('/country', 'CountryController@store');
	$this->get('/country/{id?}', 'CountryController@find');
	$this->put('/country/{id}', 'CountryController@update');
	$this->delete('/country/{id}', 'CountryController@destroy');
});

// Provinces
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/provinces', 'ProvinceController@all');
	$this->post('/province', 'ProvinceController@store');
	$this->get('/province/{id?}', 'ProvinceController@find');
	$this->put('/province/{id}', 'ProvinceController@update');
	$this->delete('/province/{id}', 'ProvinceController@destroy');
});

// Tags
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/tags', 'TagController@all');
	$this->post('/tag', 'TagController@store');
	$this->get('/tag/{id?}', 'TagController@find');
	$this->put('/tag/{id}', 'TagController@update');
	$this->delete('/tag/{id}', 'TagController@destroy');
});

// Search
Route::group(['namespace' => 'Api\v1'], function () {
	$this->get('/search/articles', 'SearchController@articles');
});