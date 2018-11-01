<?php

Route::get('/images/{path}', 'ImagesController@show')->where('path', '.*');

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/about', 'PagesController@about')->name('about');

// cablera.online/search?q=string
Route::group(['prefix' => 'search'], function() {
	$this->get('/', 'SearchController@index')->name('search');
});

// Newspapers
Route::group(['prefix' => 'newspapers'], function() {
	$this->get('/', 'NewspapersController@index')->name('newspapers');
	$this->get('/{newspaper}', 'NewspapersController@show')->name('newspaper_show');
});

// Newsletters
Route::group(['prefix' => 'newsletters'], function() {
	$this->get('/', 'NewslettersController@index')->name('newsletters');
	$this->get('/{newsletters}', 'NewslettersController@show');
});

// cablera.online/scraper
Route::group(['prefix' => 'scraper'], function () {
	$this->get('/', 'ScraperController@index');
});

// chaco.argentina.cablera.online
Route::group(['domain' => '{province}.{country}'.env('SESSION_DOMAIN')], function () {
	$this->get('/', 'HomeController@index')->name('home');
});

// argentina.cablera.online
Route::group(['domain' => '{country}'.env('SESSION_DOMAIN')], function () {
	$this->get('/', 'HomeController@index')->name('home');
});

Route::get('/', 'HomeController@index')->name('home');

// Settings
Route::group(['middleware' => 'auth', 'prefix' => 'settings'], function () {
	$this->get('/', 'SettingsController@profile');
	$this->get('/profile', 'SettingsController@profile')->name('profile');
	$this->post('/profile', 'SettingsController@updateProfile');
	$this->get('/security', 'SettingsController@security')->name('security');
	$this->post('security', 'SettingsController@updatePassword');
});

// Admin
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	// Newspapers
	$this->get('/newspapers', 'NewspapersController@index')->name('admin_newspapers');
	$this->get('/newspapers/create', 'NewspapersController@create')->name('admin_newspapers_create');
	$this->post('/newspapers/create', 'NewspapersController@store');
	$this->get('/newspapers/{id}/edit', 'NewspapersController@edit')->name('admin_newspapers_edit');
	$this->post('/newspapers/{id}/edit', 'NewspapersController@update');
	
	// Links
	$this->get('/links', 'LinksController@index')->name('admin_links');
	$this->get('/links/create', 'LinksController@create')->name('admin_links_create');
	$this->post('/links/create', 'LinksController@store');
	$this->get('/links/{id}/edit', 'LinksController@edit')->name('admin_links_edit');
	$this->post('/links/{id}/edit', 'LinksController@update');
	$this->get('/links/{link}/delete', 'LinksController@delete')->name('admin_links_delete');
	$this->post('/links/{link}/delete', 'LinksController@destroy');

	// Scrapers
	$this->get('/scrapers/page', 'ScrapersController@page')->name('admin_scrapers_page');
	$this->post('/scrapers/page', 'ScrapersController@evaluatePage');

	$this->get('/scrapers/{id}/edit', 'ScrapersController@edit')->name('admin_scrapers_edit');
	$this->post('/scrapers/{id}/edit', 'ScrapersController@update');

	// Users
	$this->get('/users', 'UsersController@index')->name('admin_users');
});
