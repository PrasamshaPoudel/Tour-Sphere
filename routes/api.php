<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RomanticController;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes
Route::get('/destinations', function () {
    return \App\Models\Destination::all();
});

Route::get('/weather/current', [WeatherController::class, 'current']);
Route::get('/weather/forecast', [WeatherController::class, 'forecast']);

// Protected API routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // User profile
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // User bookings
    Route::get('/bookings', function (Request $request) {
        return $request->user()->bookings()->with('destination')->get();
    });

    Route::post('/bookings', [BookingController::class, 'store']);

    // Admin only routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', function () {
            return \App\Models\User::with('bookings')->get();
        });

        Route::get('/admin/bookings', function () {
            return \App\Models\Booking::with(['user', 'destination'])->get();
        });

        Route::get('/admin/destinations', function () {
            return \App\Models\Destination::with('bookings')->get();
        });
    });
});
