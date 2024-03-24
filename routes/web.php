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
            Route::get('/user', 'UserController@userPage')->name('user.show');
            Route::post('/user/delete', 'UserController@deleteUser')->name('user.delete');

            Route::get('/alternatif', function () {
                return "Alternatif";
            })->name('alternative.show');
        });

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:finance']], function () {
            
        });

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:stakeholder']], function () {
            
        });

        // Ubah Password
        Route::get('/change-password', 'UserController@ubahPasswordPage')->name('change-password.show');
        Route::post('/change-password/perform', 'UserController@ubahPassword')->name('change-password.perform');

        // Logout
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});
