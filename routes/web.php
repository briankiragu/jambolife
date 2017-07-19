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

// All admin routes.
Route::prefix('admin')->group(function () {
	// Super-admin routes.
	Route::middleware('role:super-admin')->group(function () {
	});

	// Admin routes.
	Route::middleware('role:admin')->group(function () {
		// Manage all events.
		Route::resource('events', EventController::class);
		Route::prefix('events')->group(function () {
			Route::resource('{event_uuid}/tickets', TicketController::class);
			Route::resource('{event_uuid}/ticket-tiers', TicketTierController::class);
			Route::resource('{event_uuid}/organisers', MerchantController::class);
			Route::get('{event_uuid}/transactions', TransactionController::class .'@index');
		});
		// Manage the merchants (organisers) and users.
		Route::resource('users', UserController::class, ['only' => ['index', 'show']]);
		Route::resource('organisers', MerchantController::class);
	});

	// Organizer routes.
	Route::middleware('role:organiser')->group(function () {
	});
});
	
// Apply verification middleware.
Route::middleware(['auth', 'verified'])->group(function () {
	// Homepage.
	Route::get('/home', 'HomeController@home')->name('home');
});
