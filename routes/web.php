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

Route::post('searchresults', 'SearchController@searchMovie')->name('searchMovie');
Route::post('testingapi', 'WatchlistController@store');
Route::get('testingapi', 'WatchlistController@show');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::get('watchlist', 'WatchlistController@index');
Route::get('watchlisttest', 'WatchlistController@loadSelectedWatchlist');
Route::get('selectedfilm/{id}', 'SearchController@searchMovieById');

// Reviews
Route::get('reviews', 'ReviewController@showReview');
Route::post('postReviews', 'ReviewController@postReview');
Route::get('reviews/{id}/edit', 'ReviewController@editReview');
Route::delete('reviews/{id}', 'ReviewController@deleteReview');
Route::put('reviews/{id}', 'ReviewController@updateReview');

// selectedActor
Route::get('selectedActor/{id}', 'SearchController@searchActor');


// Watchlist
Route::get('/watchlist', 'WatchlistController@createPage');
Route::post('/watchlist', 'WatchlistController@saveWatchlist');
Route::delete('/deletemovie/{id}', 'WatchlistController@deleteMovie');
Route::delete('/watchlist/delete', 'WatchlistController@deleteWatchlist');


Route::post('morereviews', 'ReviewController@postReview');


// Authentication Routes (added by default by laravel)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'AdminController@index');
});

Route::delete('deleteReview', 'AdminController@deleteReview');
Route::delete('deleteUser', 'AdminController@deleteUser');
Route::delete('deleteWatchlist', 'AdminController@deleteWatchlist');
Route::get('/admin/reviews', 'AdminController@showReviews');
Route::get('/admin/users', 'AdminController@showUsers');
Route::get('/admin/watchlists', 'AdminController@showWatchlists');

Route::post('/admin/add/user', 'AdminController@addUser');

Route::get('admin/add/review', function () {
    return view('admin/addReview');
});

Route::get('admin/add/watchlist', function () {
    return view('admin/addWatchlist');
});

Route::get('admin/add/user', function () {
    return view('admin/addUser');
});

// Profile
Route::get('profile', 'ProfileController@showProfile');
Route::get('profile/reviews', 'ReviewController@getMyReviews');
