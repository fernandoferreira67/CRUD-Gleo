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

Route::get('/', function () {
    return view('auth.login');
});


//Route::resource('admin/customers','CustomerController');

Route::get('/admin/customers/add','CustomerController@create');
Route::post('/admin/customers/store','CustomerController@store')->name('cadastro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


