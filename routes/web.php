<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

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
	$this->get('/tags', 'TagsController@index')->name('admin_tag');
	$this->get('/tags/create', 'TagsController@create')->name('admin_tag_create');
	$this->post('/tags/create', 'TagsController@store');
	$this->get('/tags/{id}/edit', 'TagsController@edit')->name('admin_tag_edit');
	$this->post('/tags/{id}/edit', 'TagsController@update');
	
	// Articles
	$this->get('/articles', 'ArticlesController@index')->name('admin_article');
	$this->get('/articles/{id}/edit', 'ArticlesController@edit')->name('admin_article_edit');
	$this->post('/articles/{id}/edit', 'ArticlesController@update');
});
