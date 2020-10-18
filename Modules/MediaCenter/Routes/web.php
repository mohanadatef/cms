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

Route::group(['middleware' => ['admin','auth','permission:media-center-list']], function () {
Route::prefix('/admin/news')->middleware('permission:news-list')->group(function () {
    Route::get('/index', 'NewsController@index')->middleware('permission:news-index');
    Route::get('/index/delete', 'NewsController@destroy_index')->middleware('permission:news-index-delete');
    Route::get('/create', 'NewsController@create')->middleware('permission:news-create');
    Route::Post('/store', 'NewsController@store')->middleware('permission:news-create');
    Route::get('/edit/{slug}', 'NewsController@edit')->middleware('permission:news-edit');
    Route::patch('/update/{slug}', 'NewsController@update')->middleware('permission:news-edit');
    Route::delete('/destroy/{slug}', 'NewsController@destroy')->middleware('permission:news-delete');
    Route::get('/restore/{slug}', 'NewsController@restore')->middleware('permission:news-restore');
    Route::get('/change_status/{slug}', 'NewsController@change_status')->middleware('permission:news-status');
    Route::get('/change_many_status', 'NewsController@change_many_status')->middleware('permission:news-many-status');
});


Route::prefix('/admin/client')->middleware('permission:client-list')->group(function () {
    Route::get('/index', 'ClientController@index')->middleware('permission:client-index');
    Route::get('/index/delete', 'ClientController@destroy_index')->middleware('permission:client-index-delete');
    Route::get('/create', 'ClientController@create')->middleware('permission:client-create');
    Route::Post('/store', 'ClientController@store')->middleware('permission:client-create');
    Route::get('/edit/{slug}', 'ClientController@edit')->middleware('permission:client-edit');
    Route::patch('/update/{slug}', 'ClientController@update')->middleware('permission:client-edit');
    Route::delete('/destroy/{slug}', 'ClientController@destroy')->middleware('permission:client-delete');
    Route::get('/restore/{slug}', 'ClientController@restore')->middleware('permission:client-restore');
    Route::get('/change_status/{slug}', 'ClientController@change_status')->middleware('permission:client-status');
    Route::get('/change_many_status', 'ClientController@change_many_status')->middleware('permission:client-many-status');
});

    Route::prefix('/admin/gallery')->middleware('permission:gallery-list')->group(function () {
        Route::get('/index', 'GalleryController@index')->middleware('permission:gallery-index');
        Route::get('/index/delete', 'GalleryController@destroy_index')->middleware('permission:gallery-index-delete');
        Route::get('/create', 'GalleryController@create')->middleware('permission:gallery-create');
        Route::Post('/store', 'GalleryController@store')->middleware('permission:gallery-create');
        Route::get('/edit/{slug}', 'GalleryController@edit')->middleware('permission:gallery-edit');
        Route::patch('/update/{slug}', 'GalleryController@update')->middleware('permission:gallery-edit');
        Route::delete('/destroy/{slug}', 'GalleryController@destroy')->middleware('permission:gallery-delete');
        Route::get('/restore/{slug}', 'GalleryController@restore')->middleware('permission:gallery-restore');
        Route::get('/change_status/{slug}', 'GalleryController@change_status')->middleware('permission:gallery-status');
        Route::get('/change_many_status', 'GalleryController@change_many_status')->middleware('permission:gallery-many-status');
    });

    Route::prefix('/admin/album')->middleware('permission:album-list')->group(function () {
        Route::get('/index', 'AlbumController@index')->middleware('permission:album-index');
        Route::get('/index/delete', 'AlbumController@destroy_index')->middleware('permission:album-index-delete');
        Route::get('/create', 'AlbumController@create')->middleware('permission:album-create');
        Route::Post('/store', 'AlbumController@store')->middleware('permission:album-create');
        Route::get('/edit/{slug}', 'AlbumController@edit')->middleware('permission:album-edit');
        Route::patch('/update/{slug}', 'AlbumController@update')->middleware('permission:album-edit');
        Route::delete('/destroy/{slug}', 'AlbumController@destroy')->middleware('permission:album-delete');
        Route::get('/restore/{slug}', 'AlbumController@restore')->middleware('permission:album-restore');
        Route::get('/change_status/{slug}', 'AlbumController@change_status')->middleware('permission:album-status');
        Route::get('/change_many_status', 'AlbumController@change_many_status')->middleware('permission:album-many-status');
    });
});