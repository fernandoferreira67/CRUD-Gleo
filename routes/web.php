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


Route::resource('admin/customers','CustomerController');

Auth::routes();

/*Login*/
Route::get('/', 'LoginController@dashboard')->name('admin');
Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
Route::get('/login/logout', 'LoginController@logout')->name('admin.logout');
Route::post('/login/do', 'LoginController@login')->name('admin.login.do');