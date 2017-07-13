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

// Authentication routes.
Route::prefix('auth')->group(function () {
	Route::get('awaiting-verification', Auth\RegisterController::class .'@awaitingConfirmation');
	Route::get('verifyemail/{token}', Auth\RegisterController::class .'@verify');
	Auth::routes();
});

// Apply authentication middleware.
Route::middleware(['auth', 'verified'])->group(function () {
	// Homepage.
	Route::get('/home', 'HomeController@index')->name('home');

	// Role resource routes.
	Route::resource('role', RoleController::class);

	// Permission resource routes.
	Route::resource('permission', RoleController::class);
});
