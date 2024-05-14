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

        // Routes untuk kriteria
        Route::get('/kriteria', 'KriteriaController@kriteriaPage')->name('kriteria.show');
        Route::post('/kriteria/create', 'KriteriaController@createKriteria')->name('kriteria.create');
        Route::post('/kriteria/delete', 'KriteriaController@deleteKriteria')->name('kriteria.delete');
        Route::post('/kriteria/update', 'KriteriaController@updateKriteria')->name('kriteria.update');

        // Routes untuk subkriteria
        Route::get('/subkriteria', 'SubKriteriaController@subkriteriaPage')->name('subkriteria.show');
        Route::post('/subkriteria/add', 'SubKriteriaController@addSubkriteria')->name('subkriteria.add');
        Route::post('/subkriteria/delete', 'SubKriteriaController@deleteSubkriteria')->name('subkriteria.delete');
        Route::post('/subkriteria/update', 'SubKriteriaController@updateSubkriteria')->name('subkriteria.update');

        // Routes untuk penilaian
        Route::get('/penilaian', 'PenilaianController@penilaianPage')->name('penilaian.show');
        Route::get('/penilaian/{id}', 'PenilaianController@penilaianDetailPage')->name('penilaian.detail');
        Route::post('/penilaian/create', 'PenilaianController@createPenilaian')->name('penilaian.create');
        Route::post('/penilaian/delete', 'PenilaianController@deletePenilaian')->name('penilaian.delete');

        // Routes untuk role marketing
        Route::group(['middleware' => ['userRoles:marketing']], function () {
            Route::get('/user', 'UserController@userPage')->name('user.show');
            Route::post('/user/delete', 'UserController@deleteUser')->name('user.delete');
            Route::post('/user/create','UserController@createUser')->name('user.create');

            // Routes untuk alternatif
            Route::get('/alternatif', 'AlternatifController@alternatifPage')->name('alternative.show');
            Route::post('/alternatif/add', 'AlternatifController@addAlternatif')->name('alternative.add');
            Route::post('/alternatif/delete', 'AlternatifController@deleteAlternatif')->name('alternative.delete');
            Route::post('/alternatif/update', 'AlternatifController@updateAlternatif')->name('alternative.update');
        });

        // Routes untuk role finance
        Route::group(['middleware' => ['userRoles:finance']], function () {
            
        });

        // Routes untuk role stakeholder
        Route::group(['middleware' => ['userRoles:stakeholder']], function () {
            
        });

        // Ubah Password
        Route::get('/change-password', 'UserController@ubahPasswordPage')->name('change-password.show');
        Route::post('/change-password/perform', 'UserController@ubahPassword')->name('change-password.perform');

        // Logout
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});
