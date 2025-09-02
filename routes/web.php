<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RaftingController;
use App\Http\Controllers\ParaglidingController;
use App\Http\Controllers\TrekkingController;
use App\Http\Controllers\BungeeController;
use App\Http\Controllers\RockClimbingController;
use App\Http\Controllers\MountainBikingController;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\SpiritualController;
use App\Http\Controllers\HistoricalController;

Route::view('/', 'pages.home')->name('home');
Route::view('/destinations', 'pages.destinations')->name('destinations');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/about', 'pages.about')->name('about');

// Temporary stubs so buttons don't 404 (replace later with Breeze/Jetstream)
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// 🟢 Category Pages
Route::view('/destinations/adventure', 'pages.adventure')->name('adventure');
Route::view('/destinations/culture', 'pages.culture')->name('culture');
Route::view('/destinations/nature', 'pages.nature')->name('nature');
Route::view('/destinations/spiritual', 'pages.spiritual')->name('spiritual');
Route::view('/destinations/historical', 'pages.historical')->name('historical');

// 🚣 Adventure Activity Details
Route::get('/rafting', [RaftingController::class, 'index'])->name('rafting');
Route::get('/paragliding', [ParaglidingController::class, 'index'])->name('paragliding');
Route::get('/trekking', [TrekkingController::class, 'index'])->name('trekking');
Route::get('/bungee', [BungeeController::class, 'index'])->name('bungee');
Route::get('/rock-climbing', [RockClimbingController::class, 'index'])->name('rock-climbing');
Route::get('/mountain-biking', [MountainBikingController::class, 'index'])->name('mountain-biking');

// 🏞️ Nature Activity Details
Route::get('/nature-details', [NatureController::class, 'index'])->name('nature-details');

// 🎭 Culture Activity Details  
Route::get('/culture-details', [CultureController::class, 'index'])->name('culture-details');

// 🙏 Spiritual Activity Details
Route::get('/spiritual-details', [SpiritualController::class, 'index'])->name('spiritual-details');

// 🏛️ Historical Activity Details
Route::get('/historical-details', [HistoricalController::class, 'index'])->name('historical-details');
