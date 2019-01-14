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

Route::get('/', 'AppController@index');

Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::get('/login/{social}', 'LoginController@redirect' )->middleware('guest');
Route::get('/login/{social}/callback', 'LoginController@callback' )->middleware('guest');

Route::get('{any}', function () {
    return view('app');
})->where('any','.*');