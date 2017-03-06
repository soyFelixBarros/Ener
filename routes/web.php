<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tag/{tag}', 'TagsController@show')->name('tag_show');

// Admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	// Tags
	$this->get('/tags', 'TagsController@index')->name('tags');

	// Posts
	$this->get('/posts', 'PostsController@index')->name('post');
	$this->get('/post/{id}/edit', 'PostsController@edit')->name('post_edit');
	$this->post('/post/{id}/edit', 'PostsController@update');
});

// Settings
Route::group(['middleware' => 'auth', 'prefix' => 'settings'], function () {
	$this->get('/', 'SettingsController@profile');
	$this->get('/profile', 'SettingsController@profile')->name('profile');
	$this->post('/profile', 'SettingsController@updateProfile');
	$this->get('/security', 'SettingsController@security');
	$this->post('security', 'SettingsController@updatePassword');
});
