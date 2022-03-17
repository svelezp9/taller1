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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/mobile', 'App\Http\Controllers\MobileController@index')->name("mobile.index");

Route::get('/mobile/create', 'App\Http\Controllers\MobileController@create')->name("mobile.create");

Route::post('/mobile/save', 'App\Http\Controllers\MobileController@save')->name("mobile.save");

Route::get('/mobile/delete/{id}', 'App\Http\Controllers\MobileController@delete')->name("mobile.delete");

Route::get('/mobile/{id}', 'App\Http\Controllers\MobileController@show')->name("mobile.show");

Route::get('/mobile/review/{id}', 'App\Http\Controllers\ReviewController@create')->name("review.create");

Route::post('/mobile/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name("review.save");

Auth::routes();
