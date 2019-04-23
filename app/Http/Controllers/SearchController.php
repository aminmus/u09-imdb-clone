<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Watchlist;
use App\Review;
use Illuminate\Support\Facades\Input;

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
        $reviews = Review::where('movie_id', $request->id)->where('is_approved', true)->get();
        


        $userId = Auth::id();

        // Main api call
        $movieId = $request->id;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "movie/${movieId}?api_key=45499dda27fbc45918728b51e4e82810");
        $json = $response->getBody();
        $body = json_decode($json);
        
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

        return view('selectedfilm')->with(compact('userWatchlist', 'body', 'reviews', 'credits'));
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

    public function advancedSearch(Request $request)
    {   
        $input = Input::all();
        $genres = Input::except('_token', 'year', 'language');
        $genreSearch = implode(",", $genres);
        
        if (isset($request->language)) {
            $language = "";
            switch (strtolower($request->language)){
                case "cs";
                $language = "cs";
                break;
                case "da";
                $language = "da";
                break;
                case "de";
                $language = "de";
                break;
                case "et";
                $language = "et";
                break;
                case "fi";
                $language = "fi";
                break;
                case "fr";
                $language = "fr";
                break;
                case "ga";
                $language = "ga";
                break;
                case "id";
                $language = "id";
                break;
                case "is";
                $language = "is";
                break;
                case "it";
                $language = "it";
                break;
                case "ja";
                $language = "ja";
                break;
                case "ko";
                $language = "ko";
                break;
                case "no";
                $language = "no";
                break;
                case "pt";
                $language = "pt";
                break;
                case "ru";
                $language = "ru";
                break;
                case "es";
                $language = "ES";
                break;
                case "sv";
                $language = "sv";
                break;
                case "en";
                $language = "en";
                break;
                default:
                echo "hello";
    
            }
        }
        
        $releaseDate = $request->year;
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "discover/movie?api_key=45499dda27fbc45918728b51e4e82810&language=${language}&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=${genreSearch}&primary_release_year=${releaseDate}");
        $json = $response->getBody();
        $body = json_decode($json);
        
        return view('advancedsearch')->with('body', $body);
        
    }

    
}
