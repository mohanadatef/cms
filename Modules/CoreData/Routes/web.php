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
Route::group(['middleware' => ['admin','auth','permission:core-data-list']], function () {
Route::prefix('/admin/service')->middleware('permission:service-list')->group(function () {
    Route::get('/index', 'ServiceController@index')->middleware('permission:service-index');
    Route::get('/index/delete', 'ServiceController@destroy_index')->middleware('permission:service-index-delete');
    Route::get('/create', 'ServiceController@create')->middleware('permission:service-create');
    Route::Post('/store', 'ServiceController@store')->middleware('permission:service-create');
    Route::get('/edit/{slug}', 'ServiceController@edit')->middleware('permission:service-edit');
    Route::patch('/update/{slug}', 'ServiceController@update')->middleware('permission:service-edit');
    Route::delete('/destroy/{slug}', 'ServiceController@destroy')->middleware('permission:service-delete');
    Route::get('/restore/{slug}', 'ServiceController@restore')->middleware('permission:service-restore');
    Route::get('/change_status/{slug}', 'ServiceController@change_status')->middleware('permission:service-status');
    Route::get('/change_many_status', 'ServiceController@change_many_status')->middleware('permission:service-many-status');
});
    Route::prefix('/admin/category_service')->middleware('permission:category-service-list')->group(function () {
        Route::get('/index', 'Category_ServiceController@index')->middleware('permission:category-service-index');
        Route::get('/index/delete', 'Category_ServiceController@destroy_index')->middleware('permission:category-service-index-delete');
        Route::get('/create', 'Category_ServiceController@create')->middleware('permission:category-service-create');
        Route::Post('/store', 'Category_ServiceController@store')->middleware('permission:category-service-create');
        Route::get('/edit/{slug}', 'Category_ServiceController@edit')->middleware('permission:category-service-edit');
        Route::patch('/update/{slug}', 'Category_ServiceController@update')->middleware('permission:category-service-edit');
        Route::delete('/destroy/{slug}', 'Category_ServiceController@destroy')->middleware('permission:category-service-delete');
        Route::get('/restore/{slug}', 'Category_ServiceController@restore')->middleware('permission:category-service-restore');
        Route::get('/change_status/{slug}', 'Category_ServiceController@change_status')->middleware('permission:category-service-status');
        Route::get('/change_many_status', 'Category_ServiceController@change_many_status')->middleware('permission:category-service-many-status');
    });
    Route::prefix('/admin/product')->middleware('permission:product-list')->group(function () {
        Route::get('/index', 'ProductController@index')->middleware('permission:product-index');
        Route::get('/index/delete', 'ProductController@destroy_index')->middleware('permission:product-index-delete');
        Route::get('/create', 'ProductController@create')->middleware('permission:product-create');
        Route::Post('/store', 'ProductController@store')->middleware('permission:product-create');
        Route::get('/edit/{slug}', 'ProductController@edit')->middleware('permission:product-edit');
        Route::patch('/update/{slug}', 'ProductController@update')->middleware('permission:product-edit');
        Route::delete('/destroy/{slug}', 'ProductController@destroy')->middleware('permission:product-delete');
        Route::get('/restore/{slug}', 'ProductController@restore')->middleware('permission:product-restore');
        Route::get('/change_status/{slug}', 'ProductController@change_status')->middleware('permission:product-status');
        Route::get('/change_many_status', 'ProductController@change_many_status')->middleware('permission:product-many-status');
    });
    Route::prefix('/admin/item')->middleware('permission:item-list')->group(function () {
        Route::get('/index', 'itemController@index')->middleware('permission:item-index');
        Route::get('/index/delete', 'itemController@destroy_index')->middleware('permission:item-index-delete');
        Route::get('/create', 'itemController@create')->middleware('permission:item-create');
        Route::Post('/store', 'itemController@store')->middleware('permission:item-create');
        Route::get('/edit/{slug}', 'itemController@edit')->middleware('permission:item-edit');
        Route::patch('/update/{slug}', 'itemController@update')->middleware('permission:item-edit');
        Route::delete('/destroy/{slug}', 'itemController@destroy')->middleware('permission:item-delete');
        Route::get('/restore/{slug}', 'itemController@restore')->middleware('permission:item-restore');
        Route::get('/change_status/{slug}', 'itemController@change_status')->middleware('permission:item-status');
        Route::get('/change_many_status', 'itemController@change_many_status')->middleware('permission:item-many-status');
    });
    Route::prefix('/admin/vacance')->middleware('permission:vacance-list')->group(function () {
        Route::get('/index', 'VacanceController@index')->middleware('permission:vacance-index');
        Route::get('/index/delete', 'VacanceController@destroy_index')->middleware('permission:vacance-index-delete');
        Route::get('/create', 'VacanceController@create')->middleware('permission:vacance-create');
        Route::Post('/store', 'VacanceController@store')->middleware('permission:vacance-create');
        Route::get('/edit/{slug}', 'VacanceController@edit')->middleware('permission:vacance-edit');
        Route::patch('/update/{slug}', 'VacanceController@update')->middleware('permission:vacance-edit');
        Route::delete('/destroy/{slug}', 'VacanceController@destroy')->middleware('permission:vacance-delete');
        Route::get('/restore/{slug}', 'VacanceController@restore')->middleware('permission:vacance-restore');
        Route::get('/change_status/{slug}', 'VacanceController@change_status')->middleware('permission:vacance-status');
        Route::get('/change_many_status', 'VacanceController@change_many_status')->middleware('permission:vacance-many-status');
    });
    Route::prefix('/admin/size')->middleware('permission:size-list')->group(function () {
        Route::get('/index', 'SizeController@index')->middleware('permission:size-index');
        Route::get('/index/delete', 'SizeController@destroy_index')->middleware('permission:size-index-delete');
        Route::get('/create', 'SizeController@create')->middleware('permission:size-create');
        Route::Post('/store', 'SizeController@store')->middleware('permission:size-create');
        Route::get('/edit/{slug}', 'SizeController@edit')->middleware('permission:size-edit');
        Route::patch('/update/{slug}', 'SizeController@update')->middleware('permission:size-edit');
        Route::delete('/destroy/{slug}', 'SizeController@destroy')->middleware('permission:size-delete');
        Route::get('/restore/{slug}', 'SizeController@restore')->middleware('permission:size-restore');
        Route::get('/change_status/{slug}', 'SizeController@change_status')->middleware('permission:size-status');
        Route::get('/change_many_status', 'SizeController@change_many_status')->middleware('permission:size-many-status');
    });
});