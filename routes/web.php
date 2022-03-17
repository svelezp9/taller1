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

Route::middleware('admin')->group(function () {

    Route::get('/', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/mobile', 'App\Http\Controllers\Admin\AdminMobileController@index')->name("admin.mobile.index");

    Route::get('/admin/mobile/create', 'App\Http\Controllers\Admin\AdminMobileController@create')->name("admin.mobile.create");

    Route::post('/admin/mobile/save', 'App\Http\Controllers\Admin\AdminMobileController@save')->name("admin.mobile.save");
    
    Route::get('/admin/mobile/{id}', 'App\Http\Controllers\Admin\AdminMobileController@show')->name("admin.mobile.show");

    Route::get('/admin/mobile/review/create/{id}', 'App\Http\Controllers\Admin\AdminReviewController@create')->name("admin.review.create");

    Route::get('/admin/mobile/review/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name("admin.review.delete");

    Route::get('/admin/mobile/review/updateD/{id}', 'App\Http\Controllers\Admin\AdminReviewController@updateData')->name("admin.review.updateData");

    Route::post('/admin/mobile/review/save/{id}', 'App\Http\Controllers\Admin\AdminReviewController@save')->name("admin.review.save");

    Route::post('/admin/mobile/review/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name("admin.review.update");
});

Auth::routes();
