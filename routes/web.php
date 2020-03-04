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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/advance', 'HomeController@advance')->name('advance');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('jobs', 'JobController');
    Route::resource('applications', 'ApplicationController');
    Route::get('applications/download/{application}', 'ApplicationController@download')->name('download');
    Route::get('/dashboard', 'ApplicationController@dashboard');
});
Route::post('/notify', 'HomeController@notify');
Route::post('applications/upload', 'ApplicationController@upload')->name('upload');