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
Route::auth();
Route::group(['middleware' => 'web'], function() {	
	Route::resource('profile', 'ProfileController');
	Route::resource('user', 'UserController');
	Route::get('/settings', 'DashboardController@settings');
	Route::get('/', 'DashboardController@index');
	Route::get('/{modules}', 'DashboardController@modules');
});


