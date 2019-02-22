<?php

Route::get('/images/{path}', 'ImagesController@show')->where('path', '.*');

Auth::routes([
	'register' => false
]);

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
	// Admin
	Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function() {
		// Dashboard
		Route::name('dashboard.')->prefix('dashboard')->group(function() {
			$this->get('/', 'DashboardController@index')->name('index');
		});

		// Sources
		Route::name('sources.')->prefix('sources')->group(function() {
			$this->get('/', 'SourcesController@index')->name('index');
			$this->get('/{id}', 'SourcesController@show')->name('show');
			$this->get('/{id}/edit', 'SourcesController@edit')->name('edit');
            $this->post('/{id}/edit', 'SourcesController@update');
		});

		// Links
		Route::name('links.')->prefix('links')->group(function() {
			$this->get('/{id}', 'LinksController@show')->name('show');
		});
	});
});