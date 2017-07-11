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

Route::get('/', function () {
    return view('welcome');
});

Route::post('role/{id}/permission', RoleController::class .'@addPermission')->name('role.permission.add');
Route::put('role/{id}/permission', RoleController::class .'@editPermission')->name('role.permission.edit');
Route::delete('role/{id}/permission', RoleController::class .'@revokePermission')->name('role.permission.revoke');
Route::resource('role', RoleController::class);
Route::resource('permission', RoleController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
