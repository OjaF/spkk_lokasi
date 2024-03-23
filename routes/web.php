<?php

use Illuminate\Support\Facades\Route;

/**
 * Login Routes
 */
Route::get('/', 'App\Http\Controllers\LoginController@show')->name('login.show');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.perform');

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['middleware' => ['auth']], function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:marketing']], function () {
            
        });

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:finance']], function () {
            
        });

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:stakeholder']], function () {
            
        });

        // Ubah Password
        Route::get('/change-password', 'ChangePasswordController@show')->name('change-password.show');

        // Logout
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});
