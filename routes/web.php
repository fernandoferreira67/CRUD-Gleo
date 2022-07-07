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
Auth::routes();

/*Login*/
Route::get('/', 'LoginController@dashboard')->name('admin');
Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
Route::get('/login/logout', 'LoginController@logout')->name('admin.logout');
Route::post('/login/do', 'LoginController@login')->name('admin.login.do');

/*Customers*/
Route::resource('admin/customers','CustomerController');

/*Order Services*/
Route::get('admin/os','OrderServiceController@index')->name('os.index');
Route::get('admin/os/create','OrderServiceController@create')->name('os.create');
Route::post('admin/os/store','OrderServiceController@store')->name('os.store');
Route::get('admin/os/{orderService}/edit','OrderServiceController@edit')->name('os.edit');
Route::put('admin/os/{orderService}','OrderServiceController@update')->name('os.update');
Route::put('admin/os/destroy/{id}','OrderServiceController@destroy')->name('os.destroy');
Route::get('admin/os/search/{status}','OrderServiceController@searchCustom')->name('os.search.custom');
Route::get('admin/os/pdf', 'OrderServiceController@generatePDF')->name('os.generatePDF');
Route::get('admin/os/print/{id}', 'OrderServiceController@generatePrint')->name('os.generatePrint');
Route::get('admin/os/endprint/{id}', 'OrderServiceController@generatePrintFinished')->name('os.generatePrintFinished');
Route::get('admin/os/searchOs', 'OrderServiceController@search')->name('os.search');

/*Customer - Order Services*/
Route::get('admin/customers/os/user/{id}','OrderServiceController@history')->name('customer.os.history');

/*Reports*/
/*Customers*/
Route::get('admin/reports/customers/all','ReportController@reportAllCustomers')->name('admin.reports.customers.all');
/*Order Services*/
Route::get('admin/reports/os/all','ReportController@reportAllOS')->name('admin.reports.os.all');
Route::get('admin/reports/os/ospeding','ReportController@reportOsPeding')->name('admin.reports.ospeding');
Route::get('admin/reports/os/oswaiting','ReportController@reportOsWaiting')->name('admin.reports.oswaiting');
Route::get('admin/reports/os/cancel','ReportController@reportOSCancel')->name('admin.reports.os.cancel');
Route::get('admin/reports/os/progress','ReportController@reportOSProgress')->name('admin.reports.os.progress');
Route::get('admin/reports/os/finished','ReportController@reportOSfinished')->name('admin.reports.os.finished');

/*Report Custom*/
Route::get('admin/reports/index','ReportController@index')->name('admin.reports.index');
Route::post('admin/reports/custom','ReportController@reportCustom')->name('admin.reports.custom');

/*Settings*/
/*Users*/
Route::get('admin/settings/users/index', 'LoginController@index')->name('admin.settings.users.index');
Route::get('admin/settings/users/create', 'LoginController@create')->name('admin.settings.users.create');
Route::post('admin/settings/users/store', 'LoginController@store')->name('admin.settings.users.store');
Route::get('admin/settings/users/{user}/edit', 'LoginController@edit')->name('admin.settings.users.edit');
Route::put('admin/settings/users/{user}', 'LoginController@update')->name('admin.settings.users.update');

/*Backup*/
Route::get('admin/settings/backup/index', 'BackupController@index')->name('admin.settings.backup.index');
Route::get('admin/settings/backup/simple', 'BackupController@backupSimple')->name('admin.settings.backup.simple');
Route::get('admin/settings/backup/complete', 'BackupController@backupComplete')->name('admin.settings.backup.complete');

