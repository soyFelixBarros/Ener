<?php
$this->get('/', function () {
	return 'API';
});
// api.example.com
Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
	
	$this->get('/', function () {
		return 'v1';
	});
	
	// Posts
	$this->group(['prefix' => 'posts'], function () {
		$this->get('/', 'PostController@index');
		$this->post('/', 'PostController@store');
		$this->get('/{id?}', 'PostController@find');
		$this->put('/{id}', 'PostController@update');
		$this->delete('/{id}', 'PostController@destroy');
	});

	// Newspapers
	Route::group(['prefix' => 'newspapers'], function() {
		$this->get('/', 'NewspapersController@all');
		$this->post('/', 'NewspapersController@store');
		$this->put('/{id}', 'NewspapersController@update');
		$this->delete('/{id}', 'NewspapersController@destroy');
	});

	// Links
	Route::group(['prefix' => 'links'], function () {
		$this->get('/', 'LinksController@all');
		$this->post('/', 'LinksController@store');
		$this->get('/{id?}', 'LinksController@find');
		$this->put('/{id}', 'LinksController@update');
		$this->delete('/{id}', 'LinksController@destroy');
	});

	// Countries
	Route::group(['prefix' => 'countries'], function () {
		$this->get('/', 'CountriesController@all');
		$this->post('/', 'CountriesController@store');
		$this->get('/{id?}', 'CountriesController@find');
		$this->put('/{id}', 'CountriesController@update');
		$this->delete('/{id}', 'CountriesController@destroy');
	});

	// Provinces
	Route::group(['prefix' => 'provinces'], function () {
		$this->get('/', 'ProvincesController@all');
		$this->post('/', 'ProvincesController@store');
		$this->get('/{id?}', 'ProvincesController@find');
		$this->put('/{id}', 'ProvincesController@update');
		$this->delete('/{id}', 'ProvincesController@destroy');
	});
});