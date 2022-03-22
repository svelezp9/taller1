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

Route::get('/mobiles/{id}', 'App\Http\Controllers\MobileController@show')->name("mobiles.show");

Route::get('/mobiles/review/create/{id}', 'App\Http\Controllers\ReviewController@create')->name("reviews.create");

Route::post('/mobiles/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name("reviews.save");

Route::get('/mobiles/review/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name("reviews.delete");


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");

Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");


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

    Route::get('/admin/mobiles/{id}/edit', 'App\Http\Controllers\Admin\AdminMobileController@edit')->name("admin.mobile.edit");

    Route::put('/admin/mobiles/{id}/update', 'App\Http\Controllers\Admin\AdminMobileController@update')->name("admin.mobile.update");
});

Auth::routes();
