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

Route::get('/mobiles', 'App\Http\Controllers\MobileController@index')->name("mobiles.index");

Route::get('/mobiles/search','App\Http\Controllers\MobileController@search')->name("mobiles.search");

Route::get('/mobiles/top','App\Http\Controllers\MobileController@top')->name("mobiles.top");

Route::get('/mobiles/lowerPrices','App\Http\Controllers\MobileController@lowerPrices')->name("mobiles.lowerPrices");

Route::get('/mobiles/{id}', 'App\Http\Controllers\MobileController@show')->name("mobiles.show");

Route::get('/mobiles/review/create/{id}', 'App\Http\Controllers\ReviewController@create')->name("reviews.create");

Route::post('/mobiles/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name("reviews.save");

Route::get('/mobiles/review/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name("reviews.delete");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");

Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@addMobile')->name("cart.addMobile");

Route::post('/cart/add/Accessory/{id}', 'App\Http\Controllers\CartController@addAccessory')->name("cart.addAccessory");

Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

Route::get('/cart/pdf/{id}', 'App\Http\Controllers\CartController@pdf')->name("cart.pdf");


Route::middleware('auth')->group(function () {
    Route::get('/cart/acquisition', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
});

Route::middleware('admin')->group(function () {

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/mobiles', 'App\Http\Controllers\Admin\AdminMobileController@index')->name("admin.mobile.index");

    Route::get('/admin/mobiles/create', 'App\Http\Controllers\Admin\AdminMobileController@create')->name("admin.mobile.create");

    Route::post('/admin/mobiles/save', 'App\Http\Controllers\Admin\AdminMobileController@save')->name("admin.mobile.save");
    
    Route::get('/admin/mobiles/{id}', 'App\Http\Controllers\Admin\AdminMobileController@show')->name("admin.mobile.show");

    Route::get('/admin/mobiles/review/create/{id}', 'App\Http\Controllers\Admin\AdminReviewController@create')->name("admin.review.create");

    Route::get('/admin/mobiles/review/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name("admin.review.delete");

    Route::get('/admin/mobiles/review/updateD/{id}', 'App\Http\Controllers\Admin\AdminReviewController@updateData')->name("admin.review.updateData");

    Route::post('/admin/mobiles/review/save/{id}', 'App\Http\Controllers\Admin\AdminReviewController@save')->name("admin.review.save");

    Route::post('/admin/mobiles/review/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name("admin.review.update");

    Route::get('/admin/mobiles/edit/{id}', 'App\Http\Controllers\Admin\AdminMobileController@edit')->name("admin.mobile.edit");

    Route::post('/admin/mobiles/update/{id}', 'App\Http\Controllers\Admin\AdminMobileController@update')->name("admin.mobile.update");
});

Auth::routes();
