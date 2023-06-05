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

Route::get('/','Panel\IndexController@index')->middleware('auth')->name('panel');

Route::get('auth', 'Auth\LoginController@index')->name('login')->middleware('guest');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('auth', 'Auth\LoginController@login')->middleware('guest');
