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
Route::resource('watchlist', 'WatchlistController');
Route::get('testingapi', 'WatchlistController@test');

Route::post('test', 'SearchController@gettest')->name('test.testing');
Route::post('testingapi', 'WatchlistController@store');
Route::get('testingapi', 'WatchlistController@show');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::get('nowpls', 'TestController@index');