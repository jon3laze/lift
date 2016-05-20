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
	Route::get('/profile', 'ProfileController@show');
	Route::get('/profile/edit', 'ProfileController@edit');
	Route::get('/settings', 'DashboardController@settings');
	Route::get('/', 'DashboardController@index');
	Route::get('/{modules}', 'DashboardController@modules');
});


