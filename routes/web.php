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

// Route::get('/testsearch', function () {
//     return view('testsearch')->with($json);
// });

// Route::get('/testsearch', function () {
//     return view('testsearch');
// });
