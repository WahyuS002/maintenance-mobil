<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('welcome');
});

// ADMIN
Route::get('/admin', 'AdminController@index')->name('admin');

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

Route::patch('/brand/{brand:id}/update', 'BrandController@update');

Route::delete('/brand/{brand:id}/delete', 'BrandController@destroy');
