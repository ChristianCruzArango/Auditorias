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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Proceso de categorìas */
    Route::get('admin/categories', 'admin\CategoryController@index');
    Route::get('admin/categories/create', 'admin\CategoryController@create');
    Route::post('admin/categories', 'admin\CategoryController@store');
    Route::get('admin/categories/{category}/edit', 'admin\CategoryController@edit');
    Route::post('admin/categories/{category}/edit', 'admin\CategoryController@update');
    Route::delete('admin/categories/{category}', 'admin\CategoryController@destroy');
/* Fin */
