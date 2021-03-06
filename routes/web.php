<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // ADMIN
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // DRIVER
    Route::get('/driver', 'DriverController@index')->name('admin.driver');

    // MOBIL
    Route::get('/mobil', 'MobilController@index')->name('admin.mobil');

    // BRAND
    Route::get('/brand', 'BrandController@index')->name('brand');
    Route::get('/brand/{brand:nama_brand}', 'BrandController@show');

    // TREATMENT
    Route::get('/treatment', 'TreatmentController@index')->name('treatment');

    Route::get('/setting/admin', 'AdminSettingController@index')->name('setting.admin');
    Route::patch('/setting/admin/change-password', 'AdminSettingController@password')->name('setting.admin.password');
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

    Route::get('/myprofile', 'ProfileController@index')->name('profile');

    // SETTINGS
    Route::get('/setting/profile', 'SettingController@index')->name('settings');

    Route::patch('/setting/update', 'SettingController@update')->name('setting.update');

    Route::get('/setting/change-password', 'SettingController@passwordForm')->name('setting.change-password');
    Route::patch('/setting/password', 'SettingController@password')->name('setting.password');
});
