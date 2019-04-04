<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Watchlist;
use App\Review;


class SearchController extends Controller
{

    public function __construct()
    {
        // ser till att man måste vara en authorized user för att kunna se vyerna i denna controller förutom de i except arrayen.
        // $this->middleware('auth', ['except' => ['searchMovie', 'getPopularMovies']]);
    }

    public function searchMovie(Request $request) 
    {
       
       
        

        $searchString = $request->search;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "search/movie?api_key=45499dda27fbc45918728b51e4e82810&query=${searchString}");
        $json = $response->getBody();
        $body = json_decode($json);
       
        
        return view('searchresult')->with('body', $body);
    } 

    public function searchMovieById(Request $request)
    {
        /* This function recieves a request when a user clicks a movie after having used the search function and makes a request with the movie id */
        
        $reviews = Review::where('film_id', $request->id)->get();
        


        $userId = Auth::id();
        $checkWatchlist = Watchlist::where('user_id', $userId)->exists();
        $userWatchlist = null;
        if($checkWatchlist) {
            $userWatchlist = Watchlist::where('user_id', $userId)->get();
        } 
        
        
        /* if($userWatchlist) 
        {

        } else {

        } */

        $movieId = $request->id;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "movie/${movieId}?api_key=45499dda27fbc45918728b51e4e82810");
        
        $json = $response->getBody();
        $body = json_decode($json);
        /* return view('selectedfilm')->with('body', $body); */
        return view('selectedfilm')->with(compact('userWatchlist', 'body', 'reviews'));

    }

    public function getPopularMovies()
    {
        /* This function gets the current popular movies */
        
       
        
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "movie/popular?api_key=45499dda27fbc45918728b51e4e82810&language=en-US&page=1");
        
        $json = $response->getBody();
        $popularMovies = json_decode($json);
        return view('popularmovies')->with('popularMovies', $popularMovies);
        
    }
}