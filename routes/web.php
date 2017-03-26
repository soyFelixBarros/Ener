<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/crawlers', 'CrawlersController@index');
Route::get('/crawlers/title', 'CrawlersController@title');
Route::get('/crawlers/summary/{post}', 'CrawlersController@summary');

Route::get('/tag/{tag}', 'TagsController@show')->name('tag_show');

Route::get('/newspaper/{newspaper}', 'NewspapersController@show')->name('newspaper_show');

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
	// Tags
	$this->get('/tags', 'TagsController@index')->name('admin_tags');
	$this->get('/tags/create', 'TagsController@create')->name('admin_tag_create');
	$this->post('/tags/create', 'TagsController@store');
	$this->get('/tags/{id}/edit', 'TagsController@edit')->name('admin_tag_edit');
	$this->post('/tags/{id}/edit', 'TagsController@update');
	
	// Posts
	$this->get('/posts', 'PostsController@index')->name('admin_posts');
	$this->get('/posts/{id}/edit', 'PostsController@edit')->name('admin_posts_edit');
	$this->post('/posts/{id}/edit', 'PostsController@update');

	// Users
	$this->get('/users', 'UsersController@index')->name('admin_users');
});
