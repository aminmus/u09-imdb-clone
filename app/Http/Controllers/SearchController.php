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
        $response = $client->request('GET', "search/movie?api_key=45499dda27fbc45918728b51e4e82810&query=${searchString}&apprend_to_response=videos");
        $json = $response->getBody();
        $body = json_decode($json);
       
        
        return view('searchresult')->with('body', $body);
    }

    public function searchMovieById(Request $request)
    {
        /* This function recieves a request when a user clicks a movie after having used the search function and makes a request with the movie id */
        $reviews = Review::where('movie_id', $request->id)->where('is_approved', true)->get();
        


        $userId = Auth::id();

        // Main api call
        $movieId = $request->id;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "movie/${movieId}?api_key=45499dda27fbc45918728b51e4e82810&append_to_response=videos");
        $json = $response->getBody();
        $body = json_decode($json);
        $trailers = reset($body->videos);
        $trailer = reset($trailers);
        
        
        // Second api call
        $movieId2 = $request->id;
        $client2 = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response2 = $client2->request('GET', "movie/${movieId2}/credits?api_key=45499dda27fbc45918728b51e4e82810");
        $json2 = $response2->getBody();
        $credits = json_decode($json2);

        $checkWatchlist = Watchlist::where('user_id', $userId)->exists();

        if ($checkWatchlist === true) {
            $userWatchlist = Watchlist::where('user_id', $userId)->get();
        }

        return view('selectedfilm')->with(compact('userWatchlist', 'body', 'reviews', 'credits', 'trailer'));
    }

    public function getPopularMovies()
    {
        /* This function gets the current popular movies */
       
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "movie/upcoming?api_key=45499dda27fbc45918728b51e4e82810&language=en-US&page=1");
        
        $json = $response->getBody();
        $upcoming = json_decode($json);
        
        // Gets upcoming movies
        $client2 = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response2 = $client2->request('GET', "movie/now_playing?api_key=45499dda27fbc45918728b51e4e82810&language=en-US&page=1&region=US");
        
        $json2 = $response2->getBody();
        $nowplaying = json_decode($json2);
        
        return view('popularmovies')->with(compact('upcoming', 'nowplaying'));

    }

    public function searchActor(Request $request)
    {
        // Get movies
        $actorId = $request->id;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "person/${actorId}/movie_credits?api_key=45499dda27fbc45918728b51e4e82810&language=en-US");
        $json = $response->getBody();
        $result = json_decode($json);
        $movies = $result->cast;

        // Get info
        $personId = $request->id;
        $client2 = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response2 = $client2->request('GET', "person/${personId}?api_key=45499dda27fbc45918728b51e4e82810&language=en-US");
        $json2 = $response2->getBody();
        $result2 = json_decode($json2);
        $actor = $result2;
        
        return view('selectedactor')->with(compact('movies', 'actor'));
    }

    public function searchByGenre(Request $request) 
    {
        $genreId = $request->id;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "discover/movie?api_key=45499dda27fbc45918728b51e4e82810&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&with_genres=${genreId}");
        $json = $response->getBody();
        $result = json_decode($json);
        

        return view('searchbygenre')->with(compact('result'));
        
    }
}
