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
Route::get('/', 'SearchController@getPopularMovies');
Route::resource('watchlist', 'WatchlistController');
Route::get('testingapi', 'WatchlistController@test');

Route::post('selectedfilm', 'SearchController@searchMovie')->name('searchMovie');
Route::post('testingapi', 'WatchlistController@store');
Route::get('testingapi', 'WatchlistController@show');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::get('watchlist', 'WatchlistController@index');
Route::get('watchlisttest', 'WatchlistController@loadSelectedWatchlist');
Route::get('showmovie/{id}', 'SearchController@searchMovieById');


// Leo routes
Route::get('watchlist/create', 'WatchlistController@create');
Route::post('/watchlist', 'WatchlistController@saveWatchlist');

// Authentication Routes (added by default by laravel)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
