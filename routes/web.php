<?php

use Illuminate\Support\Facades\Route;

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
// Static Page route
Route::get('/', function () {
    return view('index');
});
Route::get('/game', function () {
    return view('game_page');
});
Route::get('/tournament', function () {
    return view('tournament');
});
Route::get('/leaderboard', function () {
    return view('leaderboard');
});
Route::get('/contact', function () {
    return view('contactUs');
});
Route::get('/about', function () {
    return view('about_us');
});

// registration
Route::post('registration','registration_page@store');


// Registration complete with google.
Route::get('register_complete', function () {
    return view('registration_complete');
});

// full registeration form
Route::post('register_complete_form', 'registration_page@update');

// Google Authentication Routes
Route::get('/redirect', 'SocialAuthGoogleControllerController@redirect');
Route::get('/google_callback', 'SocialAuthGoogleControllerController@callback');
