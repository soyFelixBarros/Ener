<?php
$this->get('/', function () {
	return 'API';
});
// api.example.com
Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
	
	$this->get('/', function () {
		return 'v1';
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
});