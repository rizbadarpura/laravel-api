<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('api/register', 'UserController@register');
Route::post('api/login', 'UserController@authenticate');
Route::get('api/open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('api/user', 'UserController@getAuthenticatedUser');
    Route::get('api/closed', 'DataController@closed');
	Route::post('api/posts', 'PostController@store');
	Route::post('api/comments', 'CommentController@store');
});

Route::get('api/posts', 'PostController@index');
Route::get('api/posts/{id}', 'PostController@show');
Route::get('api/comments', 'CommentController@index');
Route::get('api/comments/{id}', 'CommentController@show');