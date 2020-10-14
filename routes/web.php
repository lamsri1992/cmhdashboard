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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
