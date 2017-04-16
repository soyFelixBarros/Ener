<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/tag/{tag}', 'TagsController@show')->name('tag_show');

Route::get('/newspaper/{newspaper}', 'NewspapersController@show')->name('newspaper_show');

// Crawlers
Route::group(['prefix' => 'crawlers'], function() {
	$this->get('/', 'CrawlersController@index');
	$this->get('/title', 'CrawlersController@title');
	$this->get('/summary', 'CrawlersController@summary');
	$this->get('/image', 'CrawlersController@image');
});

// Settings
Route::group(['middleware' => 'auth', 'prefix' => 'settings'], function () {
	$this->get('/', 'SettingsController@profile');
	$this->get('/profile', 'SettingsController@profile')->name('profile');
	$this->post('/profile', 'SettingsController@updateProfile');
	$this->get('/security', 'SettingsController@security')->name('security');
	$this->post('security', 'SettingsController@updatePassword');
});

// Favorites
Route::group(['middleware' => 'auth', 'prefix' => 'favorites'], function () {
	$this->get('/', 'FavoritesController@posts')->name('favorites');
});

// Admin
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	// Tags
	$this->get('/tags', 'TagsController@index')->name('admin_tags');
	$this->get('/tags/create', 'TagsController@create')->name('admin_tag_create');
	$this->post('/tags/create', 'TagsController@store');
	$this->get('/tags/{id}/edit', 'TagsController@edit')->name('admin_tag_edit');
	$this->post('/tags/{id}/edit', 'TagsController@update');

	// Newspapers
	$this->get('/newspapers', 'NewspapersController@index')->name('admin_newspapers');
	$this->get('/newspapers/{id}/edit', 'NewspapersController@edit')->name('admin_newspapers_edit');
	$this->post('/newspapers/{id}/edit', 'NewspapersController@update');
	
	// Posts
	$this->get('/posts', 'PostsController@index')->name('admin_posts');
	$this->get('/posts/{id}/edit', 'PostsController@edit')->name('admin_posts_edit');
	$this->post('/posts/{id}/edit', 'PostsController@update');
	$this->get('/posts/{post}/delete', 'PostsController@delete')->name('admin_posts_delete');
	$this->post('/posts/{post}/delete', 'PostsController@destroy');
	$this->get('/posts/{post}/favorite', 'PostsController@favorite')->name('admin_posts_favorite');

	// Users
	$this->get('/users', 'UsersController@index')->name('admin_users');
});
