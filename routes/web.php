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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('activity', 'ActivityController@index');

Route::post('add-activity', 'ActivityController@store');
Route::get('edit-activity/{id}', 'ActivityController@edit');
Route::post('edit-activity/{id}', 'ActivityController@update');
Route::get('activity/{id}/{name}', 'ActivityController@show');
Route::get('update-records', 'ActivityUpdatesController@index');
Route::post('update-records', 'ActivityUpdatesController@filter')->name('update-records');