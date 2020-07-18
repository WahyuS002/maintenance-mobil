<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // ADMIN
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // DRIVER
    Route::get('/driver', 'DriverController@index')->name('admin.driver');

    Route::get('/driver/create', 'DriverController@create');
    Route::post('/driver/store', 'DriverController@store');

    Route::delete('/driver/{driver:id}/delete', 'DriverController@destroy');

    Route::get('/driver/{driver:id}/edit', 'DriverController@edit');
    Route::patch('/driver/{driver:id}/update', 'DriverController@update');

    // MOBIL
    Route::get('/mobil', 'MobilController@index')->name('admin.mobil');

    Route::get('/mobil/create', 'MobilController@create');
    Route::post('/mobil/store', 'MobilController@store');

    Route::get('/mobil/{mobil:id}/edit', 'MobilController@edit');
    Route::patch('/mobil/{mobil:id}/update', 'MobilController@update');

    Route::delete('/mobil/{mobil:id}/delete', 'MobilController@destroy');

    // BRAND
    Route::get('/brand', 'BrandController@index')->name('brand');
    Route::get('/brand/{brand:nama_brand}', 'BrandController@show');

    Route::post('/brand/store', 'BrandController@store');

    Route::patch('/brand/{brand:id}/update', 'BrandController@update');

    Route::delete('/brand/{brand:id}/delete', 'BrandController@destroy');

    // TREATMENT
    Route::get('/treatment', 'TreatmentController@index')->name('treatment');

    Route::post('/treatment/store', 'TreatmentController@store')->name('treatment.store');

    Route::patch('/treatment/{treatment:id}/update', 'TreatmentController@update')->name('treatment.update');

    Route::delete('/treatment/{treatment:id}/delete', 'TreatmentController@destroy');
});

// Auth::routes(); Change to 
Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::middleware('guest:driver')->group(function () {
    Route::get('/login', 'Auth\DriverLoginController@showLoginForm')->name('driver.login');
    Route::post('/login', 'Auth\DriverLoginController@login')->name('driver.login.submit');
});

Route::middleware('auth:driver')->group(function () {
    Route::get('/log', 'logController@index')->name('log');

    Route::get('/log/create', 'logController@create')->name('log.create');
    Route::post('/log/{mobil:id}/store', 'logController@store')->name('log.store');
    // Route::patch('/mobil/{mobil:id}/update', 'MobilController@update');
    Route::patch('/log/{driver_mobil:id}/update', 'logController@update')->name('log.update');

    Route::delete('/log/{driver_mobil:id}/delete', 'logController@destroy')->name('log.destroy');
});
