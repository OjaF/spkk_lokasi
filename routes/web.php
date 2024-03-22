<?php

use Illuminate\Support\Facades\Route;

/**
 * Login Routes
 */
Route::get('/', 'App\Http\Controllers\LoginController@show')->name('login.show');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.perform');

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
