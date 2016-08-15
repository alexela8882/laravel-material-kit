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
    return redirect()->guest('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Users
Route::group(['prefix' => 'users'], function () {
	Route::get('/', 'UserController@index');
	Route::post('/updatePassword', 'UserController@updatePassword');
	Route::get('/create', 'UserController@create');
	Route::post('/store', 'UserController@store');
	Route::get('/{id}/edit', 'UserController@edit');
	Route::post('/{id}/update', 'UserController@update');
	Route::get('/{id}/delete', 'UserController@delete');
});

// profile
Route::group(['prefix' => 'profiles'], function () {
	Route::get('/', 'ProfileController@index');
	Route::get('/changePassword', 'ProfileController@changePassword');
	Route::post('/updatePassword', 'ProfileController@updatePassword');
});

// Branches
Route::group(['prefix' => 'branches'], function () {
	Route::get('/', 'BranchController@index');
	Route::get('/create', 'BranchController@create');
	Route::post('/store', 'BranchController@store');
	Route::get('/{id}/edit', 'BranchController@edit');
	Route::post('/{id}/update', 'BranchController@update');
	Route::get('/{id}/delete', 'BranchController@delete');
});

// Regions
Route::group(['prefix' => 'regions'], function () {
	Route::get('/', 'RegionController@index');
	Route::get('/create', 'RegionController@create');
	Route::post('/store', 'RegionController@store');
	Route::get('/{id}/edit', 'RegionController@edit');
	Route::post('/{id}/update', 'RegionController@update');
	Route::get('/{id}/delete', 'RegionController@delete');
});

// Pendings
Route::group(['prefix' => 'pendings'], function () {
	Route::get('/', 'PendingController@index');
	Route::post('/show', 'PendingController@show');
	Route::get('/create', 'PendingController@create');
	Route::get('/createPrev', 'PendingController@createPrev');
	Route::post('/store', 'PendingController@store');
	Route::get('/{id}/edit', 'PendingController@edit');
	Route::post('/{id}/update', 'PendingController@update');
	Route::get('/{id}/delete', 'PendingController@delete');
	Route::get('/{id}/readd', 'PendingController@readd');
	Route::get('/exportexcel', 'PendingController@excel');
});

// Charts
Route::group(['prefix' => 'charts'], function () {
	Route::get('/overall', 'ChartController@overall');
});
