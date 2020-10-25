<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // ADMIN
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // DRIVER
    Route::get('/driver', 'DriverController@index')->name('admin.driver');

    Route::get('/driver/create', 'DriverController@create')->name('driver.create');
    Route::post('/driver/store', 'DriverController@store');

    Route::delete('/driver/{driver:id}/delete', 'DriverController@destroy');

    Route::get('/driver/{driver:id}/edit', 'DriverController@edit');
    Route::patch('/driver/{driver:id}/update', 'DriverController@update');

    // MOBIL
    Route::get('/mobil', 'MobilController@index')->name('admin.mobil');

    // BRAND
    Route::get('/brand', 'BrandController@index')->name('brand');
    Route::get('/brand/{brand:nama_brand}', 'BrandController@show');

    Route::get('/brands/create', 'BrandController@create')->name('brand.create');

    // TREATMENT
    Route::get('/treatment', 'TreatmentController@index')->name('treatment');

    Route::get('/treatment/create', 'TreatmentController@create')->name('treatment.create');
    Route::post('/treatment/store', 'TreatmentController@store')->name('treatment.store');

    Route::patch('/treatment/{treatment:id}/update', 'TreatmentController@update')->name('treatment.update');

    Route::delete('/treatment/{treatment:id}/delete', 'TreatmentController@destroy');
});

// Auth::routes(); Change to
Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::middleware(['guest_auth', 'guest:driver'])->group(function () {
    Route::get('/login', 'Auth\DriverLoginController@showLoginForm')->name('driver.login');
    Route::post('/login', 'Auth\DriverLoginController@login')->name('driver.login.submit');
});

Route::middleware('auth:driver')->group(function () {
    Route::get('/log', 'logController@index')->name('log');

    Route::get('/log/create', 'logController@create')->name('log.create');
    Route::post('/log/{mobil:id}/store', 'logController@store')->name('log.store');

    // FINDME

    Route::patch('/log/{laporan:id}/update', 'logController@update')->name('log.update');

    Route::delete('/log/{laporan:id}/delete', 'logController@destroy')->name('log.destroy');

    Route::get('/myprofile', 'ProfileController@index')->name('profile');

    // SETTINGS
    Route::get('/setting/profile', 'SettingController@index')->name('settings');

    Route::patch('/setting/update', 'SettingController@update')->name('setting.update');

    Route::get('/setting/change-password', 'SettingController@passwordForm')->name('setting.change-password');
    Route::patch('/setting/password', 'SettingController@password')->name('setting.password');
});
