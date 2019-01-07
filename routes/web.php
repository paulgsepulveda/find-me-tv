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

Route::get('/', 'Web\AppController@index')->middleware('auth');

Route::get('/login', 'Web\LoginController@index')->name('login')->middleware('guest');
Route::get('/login/{social}', 'Web\LoginController@redirect' )->middleware('guest');
Route::get('/login/{social}/callback', 'Web\LoginController@callback' )->middleware('guest');
