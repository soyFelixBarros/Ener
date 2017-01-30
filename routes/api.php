<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts
Route::group(['prefix' => 'post'], function () {
	Route::get('/', 'Api\v1\PostController@all');
	Route::post('/', 'Api\v1\PostController@store');
	Route::get('/{id}', 'Api\v1\PostController@find')->where('id', '[0-9]+');
});