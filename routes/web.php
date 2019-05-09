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

/* Proceso de usuarios */
    Route::get('admin/users', 'admin\UserController@index');
    Route::get('admin/users/create', 'admin\UserController@create');
    Route::post('admin/users', 'admin\UserController@store');
    Route::get('admin/users/{user}/edit', 'admin\UserController@edit');
    Route::post('admin/users/{user}/edit', 'admin\UserController@update');
    Route::delete('admin/users/{user}', 'admin\UserController@destroy');
/* Fin */

/* Proceso de auditoría */
    Route::get('admin/auditorias', 'admin\AuditoriaController@index');
    Route::get('admin/auditorias/create', 'admin\AuditoriaController@create');
    Route::post('admin/auditorias', 'admin\AuditoriaController@store');
    Route::get('admin/auditorias/{audit}/edit', 'admin\AuditoriaController@edit');
    Route::post('admin/auditorias/{audit}/edit', 'admin\AuditoriaController@update');
    Route::delete('admin/auditorias/{audit}', 'admin\AuditoriaController@destroy');
/* Fin */

/* Proceso de equipos de auditorias */
    Route::get('admin/equipos', 'admin\EquipoAuditor@index');
    Route::delete('admin/auditores', 'admin\EquipoAuditor@destroy');
/* Fin */
