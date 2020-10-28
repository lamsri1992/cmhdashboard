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

Route::get('/', function () { return view('index'); });

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () { return view('index'); });
    Route::get('/{id}','DashboardController@show')->name('dashboard.show');
});

Route::group(['prefix' => 'dataset'], function () {
    Route::get('/', function () { return view('index'); });
    Route::get('/{id}','DatasetController@show')->name('dataset.show');
});

Route::group(['prefix' => 'backend'], function () {
    Route::get('/','BackendController@index')->name('backend.index');
    Route::get('/menu','MenuController@index')->name('backend.menu');
    Route::get('/menustore','MenuController@store')->name('backend.menustore');
    Route::get('/menushow/{id}','MenuController@show')->name('backend.menu_show');
    Route::get('/menuupdate/{id}','MenuController@update')->name('backend.menuupdate');
    Route::get('/report','ReportController@index')->name('backend.report');
    Route::get('/reportstore','ReportController@store')->name('backend.reportstore');
    Route::get('/reportshow/{id}','ReportController@show')->name('backend.report_show');
    Route::get('/reportupdate/{id}','ReportController@update')->name('backend.reportupdate');
    Route::get('/table','TableController@index')->name('backend.table');
    Route::get('/table_new', function () { return view('backend.table_new'); });
    Route::get('/tablestore','TableController@store')->name('backend.tablestore');
    Route::get('/table_show/{id}','TableController@show')->name('backend.table_show');
    Route::get('/tableupdate/{id}','TableController@update')->name('backend.tableupdate');
});

// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);
Route::get('/home', 'HomeController@index')->name('home');
