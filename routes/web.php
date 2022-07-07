<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/services', 'ServiceController@showServices')->name('allServices');
Route::get('/services/{service}', 'ServiceController@show')->name('service');
Route::get('/services-sorted', 'ServiceController@sortServices')->name('sort');
Route::get('/add-service', 'ServiceController@addService')->name('addService');