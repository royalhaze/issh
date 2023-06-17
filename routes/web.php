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

Route::get('panel','Panel\IndexController@index')->middleware('auth')->name('panel');
Route::get('panel/{any}', 'Panel\IndexController@index')->where('any', '.*')->middleware('auth');


Route::get('auth', 'Auth\LoginController@index')->name('login')->middleware('guest');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('auth', 'Auth\LoginController@login')->middleware('guest');


Route::get('web-api/dashboard','Panel\IndexController@dashboard_data');
Route::post('web-api/users/store','Panel\UsersController@store');
Route::get('web-api/users','Panel\UsersController@index');
