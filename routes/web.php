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
// Route::resource('watchlist', 'WatchlistController');

// Route::get('testingapi', 'WatchlistController@test');
// Route::post('testingapi', 'WatchlistController@store');
// Route::get('testingapi', 'WatchlistController@show');
// Route::get('watchlisttest', 'WatchlistController@loadSelectedWatchlist');

// // Route::get('watchlist', 'WatchlistController@index');
// Route::get('watchlists', 'WatchlistController@index');


// // Watchlist
// Route::get('/watchlist', 'WatchlistController@createPage');
// Route::post('/watchlist', 'WatchlistController@saveWatchlist');
// Route::delete('/deletemovie/{id}', 'WatchlistController@deleteMovie');
// Route::delete('/watchlist/delete', 'WatchlistController@deleteWatchlist');
// Route::put('/watchlist/edit/update', 'WatchlistController@editWatchlist');



// // RESTful Watchlists
// Route::get('/watchlists', index action); //index page to display all Watchlists
// Route::get('/watchlists/new', create action); // displays create Watchlist form      
// Route::post('/watchlists', store action); // creates/stores one watchlist
// Route::get('/watchlists/{watchlist}', show action); // displays one article based on ID in the url
// Route::get('/watchlists/{watchlist}/edit', edit action); // displays edit form based on ID in the url 
// Route::put('/watchlists/{watchlist}', update action); // modifies an existing article based on ID in the url
// Route::delete('/watchlists/{watchlist}', destroy action); // deletes one article based on ID in the url

Route::resource('watchlists', 'WatchlistController');   // Watchlist CRUD and related routes
Route::post('addfilm', 'WatchlistController@addFilm');  // Add a film to a watchlist


Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'SearchController@getPopularMovies');

Route::post('searchresults', 'SearchController@searchMovie')->name('searchMovie');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::get('selectedfilm/{id}', 'SearchController@searchMovieById');

// Reviews
Route::get('reviews', 'ReviewController@showReview');
Route::post('postReviews', 'ReviewController@postReview');
Route::get('reviews/{id}/edit', 'ReviewController@editReview');
Route::delete('reviews/{id}', 'ReviewController@deleteReview');
Route::put('reviews/{id}', 'ReviewController@updateReview');

// selectedActor
Route::get('selectedActor/{id}', 'SearchController@searchActor');



Route::post('morereviews', 'ReviewController@postReview');


// Authentication Routes (added by default by laravel)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'AdminController@index');
});

Route::delete('deleteReview/{id}', 'AdminController@deleteReview');
Route::delete('deleteUser/{id}', 'AdminController@deleteUser');
Route::get('/admin/reviews', 'AdminController@showReviews');
Route::get('/admin/users', 'AdminController@showUsers');

Route::post('/admin/add/user', 'AdminController@addUser');

Route::get('admin/add/review', function () {
    return view('admin/addReview');
});

Route::delete('deleteWatchlist/{id}', 'AdminController@deleteWatchlist');

Route::get('/admin/watchlists', 'AdminController@showWatchlists');

Route::get('admin/add/watchlist', function () {
    return view('admin/addWatchlist');
});
Route::patch('admin/watchlist/update/{id}', 'AdminController@updateWatchlist');

Route::get('admin/add/user', function () {
    return view('admin/addUser');
});

Route::patch('admin/review/update/{id}', 'AdminController@updateReview');
Route::patch('admin/users/update/{id}', 'AdminController@updateUsers');

// Profile
Route::get('profile', 'ProfileController@showProfile');
Route::get('profile/reviews', 'ReviewController@getMyReviews');
