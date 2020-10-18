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
Route::group(['middleware' => ['admin','auth','permission:acl-list']], function () {
    Route::prefix('/admin/user')->middleware('permission:user-list')->group(function () {
        Route::get('/index', 'UserController@index')->middleware('permission:user-index');
        Route::get('/index/delete', 'UserController@destroy_index')->middleware('permission:user-index-delete');
        Route::get('/create', 'UserController@create')->middleware('permission:user-create');
        Route::Post('/store', 'UserController@store')->middleware('permission:user-create');
        Route::get('/edit/{slug}', 'UserController@edit')->middleware('permission:user-edit');
        Route::patch('/update/{slug}', 'UserController@update')->middleware('permission:user-edit');
        Route::delete('/destroy/{slug}', 'UserController@destroy')->middleware('permission:user-delete');
        Route::get('/restore/{slug}', 'UserController@restore')->middleware('permission:user-restore');
        Route::get('/change_password/{slug}', 'UserController@show_password')->middleware('permission:user-password');
        Route::patch('/change_password/{slug}', 'UserController@change_password')->middleware('permission:user-password');
        Route::get('/change_status/{slug}', 'UserController@change_status')->middleware('permission:user-status');
        Route::get('/change_many_status', 'UserController@change_many_status')->middleware('permission:user-many-status');
    });

    Route::prefix('/admin/role')->middleware('permission:role-list')->group(function () {
        Route::get('/index', 'RoleController@index')->middleware('permission:role-index');
        Route::get('/index/delete', 'RoleController@show')->middleware('permission:role-index-delete');
        Route::get('/create', 'RoleController@create')->middleware('permission:role-create');
        Route::Post('/store', 'RoleController@store')->middleware('permission:role-create');
        Route::get('/edit/{slug}', 'RoleController@edit')->middleware('permission:role-edit');
        Route::patch('/update/{slug}', 'RoleController@update')->middleware('permission:role-edit');
        Route::delete('/destroy/{slug}', 'RoleController@destroy')->middleware('permission:role-delete');
        Route::get('/restore/{slug}', 'RoleController@restore')->middleware('permission:role-restore');
    });

    Route::prefix('/admin/permission')->middleware('permission:permission-list')->group(function () {
        Route::get('/index', 'PermissionController@index')->middleware('permission:permission-index');
        Route::get('/index/delete', 'PermissionController@show')->middleware('permission:permission-index-delete');
        Route::get('/create', 'PermissionController@create')->middleware('permission:permission-create');
        Route::Post('/store', 'PermissionController@store')->middleware('permission:permission-create');
        Route::get('/edit/{slug}', 'PermissionController@edit')->middleware('permission:permission-edit');
        Route::patch('/update/{slug}', 'PermissionController@update')->middleware('permission:permission-edit');
        Route::delete('/destroy/{slug}', 'PermissionController@destroy')->middleware('permission:permission-delete');
        Route::get('/restore/{slug}', 'PermissionController@restore')->middleware('permission:permission-restore');
    });
});