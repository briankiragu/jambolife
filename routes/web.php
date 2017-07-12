<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Navigational routes.
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index')->name('home');

// Authentication routes.
Route::group(['prefix' => 'auth'], function () {
	Route::get('verifyemail/{token}', Auth\RegisterController::class .'@verify');
	Auth::routes();
});

// Role resource routes.
Route::resource('role', RoleController::class);

// Permission resource routes.
Route::resource('permission', RoleController::class);

