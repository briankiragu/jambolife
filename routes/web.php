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
Route::get('auth/awaiting-verification', Auth\RegisterController::class .'@awaitingConfirmation');
Route::get('auth/verifyemail/{token}', Auth\RegisterController::class .'@verify');
Auth::routes();

// Apply verification middleware.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', 'HomeController@home')->name('home');
});

// Merchant routes.
Route::prefix('merchant')->group(function () {
    Route::get('login', 'Merchant\Auth\LoginController@showLoginForm');
    Route::post('login', 'Merchant\Auth\LoginController@login')->name('merchant.login');
    Route::middleware('auth:merchant')->group(function () {
        //
	});
});

// All admin routes.
Route::prefix('admin')->namespace('Admin')->group(function () {
    // Authentication routes.
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');

    Route::middleware('auth:admin')->group(function () {
        // Dashboard.
		Route::get('/', 'AdminDashController@dash')->name('admin.dash');
        // Event manager.
        Route::prefix('events')->group(function () {
    		Route::resource('{event_uuid}/tickets', TicketController::class);
    		Route::resource('{event_uuid}/ticket-tiers', TicketTierController::class);
    		Route::resource('{event_uuid}/organisers', MerchantController::class);
    		Route::get('{event_uuid}/transactions', TransactionController::class .'@index');
            Route::resource('users', UserController::class, ['only' => ['index', 'show']]);
            Route::resource('organisers', MerchantController::class);
    	});
        Route::resource('events', EventController::class);
	});
});
