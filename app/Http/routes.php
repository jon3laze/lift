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
	Route::get('user/search', 'UserController@search')->name('user.search');
	Route::resource('user', 'UserController');
	Route::get('role/search', 'RoleController@search')->name('role.search');
	Route::resource('role', 'RoleController');
	Route::get('settings/search', 'DashboardController@search')->name('settings.search');
	Route::resource('permission', 'PermissionController');
	Route::get('permission/search', 'PermissionController@search')->name('permission.search');
	Route::get('/settings', 'DashboardController@settings')->name('settings');
	Route::get('/', 'DashboardController@index');
	Route::get('/{modules}', 'DashboardController@modules');
});


