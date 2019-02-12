<?php

Route::get('/images/{path}', 'ImagesController@show')->where('path', '.*');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
	// Admin
	Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function() {
		// Sources
		Route::name('sources.')->prefix('sources')->group(function() {
			$this->get('/', 'SourcesController@index')->name('index');
		});
	});
});