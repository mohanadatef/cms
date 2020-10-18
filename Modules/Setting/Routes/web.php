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
Route::group(['middleware' => ['admin','auth','permission:setting-list']], function () {
    Route::prefix('/admin/setting')->middleware('permission:setting-list')->group(function () {
        Route::get('/index', 'SettingController@index')->middleware('permission:setting-index');
        Route::get('/create', 'SettingController@create')->middleware('permission:setting-create');
        Route::Post('/store', 'SettingController@store')->middleware('permission:setting-create');
        Route::get('/edit/{slug}', 'SettingController@edit')->middleware('permission:setting-edit');
        Route::patch('/update/{slug}', 'SettingController@update')->middleware('permission:setting-edit');
    });

    Route::prefix('/admin/about_us')->middleware('permission:about-us-list')->group(function () {
        Route::get('/index', 'AboutusController@index')->middleware('permission:about-us-index');
        Route::get('/create', 'AboutusController@create')->middleware('permission:about-us-create');
        Route::Post('/store', 'AboutusController@store')->middleware('permission:about-us-create');
        Route::get('/edit/{slug}', 'AboutusController@edit')->middleware('permission:about-us-edit');
        Route::patch('/update/{slug}', 'AboutusController@update')->middleware('permission:about-us-edit');
    });

    Route::prefix('/admin/contact_us')->middleware('permission:contact-us-list')->group(function () {
        Route::get('/index', 'ContactusController@index')->middleware('permission:contact-us-index');
        Route::get('/create', 'ContactusController@create')->middleware('permission:contact-us-create');
        Route::Post('/store', 'ContactusController@store')->middleware('permission:contact-us-create');
        Route::get('/edit/{slug}', 'ContactusController@edit')->middleware('permission:contact-us-edit');
        Route::patch('/update/{slug}', 'ContactusController@update')->middleware('permission:contact-us-edit');
    });

    Route::prefix('/admin/home_slider')->middleware('permission:home-slider-list')->group(function () {
        Route::get('/index', 'HomeSliderController@index')->middleware('permission:home-slider-index');
        Route::get('/index/delete', 'HomeSliderController@destroy_index')->middleware('permission:home-slider-index-delete');
        Route::get('/create', 'HomeSliderController@create')->middleware('permission:home-slider-create');
        Route::Post('/store', 'HomeSliderController@store')->middleware('permission:home-slider-create');
        Route::get('/edit/{slug}', 'HomeSliderController@edit')->middleware('permission:home-slider-edit');
        Route::patch('/update/{slug}', 'HomeSliderController@update')->middleware('permission:home-slider-edit');
        Route::delete('/destroy/{slug}', 'HomeSliderController@destroy')->middleware('permission:home-slider-delete');
        Route::get('/restore/{slug}', 'HomeSliderController@restore')->middleware('permission:home-slider-restore');
        Route::get('/change_status/{slug}', 'HomeSliderController@change_status')->middleware('permission:home-slider-status');
        Route::get('/change_many_status', 'HomeSliderController@change_many_status')->middleware('permission:home-slider-many-status');
    });
});
