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
Route::resource('watchlists', 'WatchlistController');
Route::get('testingapi', 'ExternalFilm@saveApiData');
/* Route::post('test', 'ReviewController@test');

Route::get('test', 'ReviewController@test'); */
Route::post('test', 'SearchController@gettest')->name('test.testing');
Route::post('testingapi', 'WatchlistController@store');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
