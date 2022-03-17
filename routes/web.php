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

Route::get('/mobile/{id}', 'App\Http\Controllers\MobileController@show')->name("mobile.show");

Route::get('/mobile/review/create/{id}', 'App\Http\Controllers\ReviewController@create')->name("review.create");

Route::get('/mobile/review/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name("review.delete");

Route::get('/mobile/review/updateD/{id}', 'App\Http\Controllers\ReviewController@updateData')->name("review.updateData");

Route::post('/mobile/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name("review.save");

Route::post('/mobile/review/update/{id}', 'App\Http\Controllers\ReviewController@update')->name("review.update");

Auth::routes();
