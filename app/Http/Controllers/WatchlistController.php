<?php

namespace App\Http\Controllers;

use App\Watchlist;
use App\Film;
use App\Filmwatchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use Illuminate\Support\Facades\Input;

class WatchlistController extends Controller
{
    public function __construct()
    {
        // Protects all Watchlist routes from being accessed by unauthenticated users
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $userWatchlists = Watchlist::where('user_id', $userId)->get();
        return view('watchlists.index')->with('userWatchlists', $userWatchlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('watchlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $userId = $request->user_id;

        $watchlist = new Watchlist;
        $watchlist->user_id = $userId;
        $watchlist->name = $request->name;
        $watchlist->save();
        return redirect('watchlists')->with('success', 'Watchlist Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function show(Watchlist $watchlist)
    {
        // Gets all film objects for this watchlist (using helper method)
        $films = self::getFilms($watchlist);

        // Sends film objects to returned view
        return view('watchlists.show')->with(compact('films', 'watchlist'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlist, Request $request)
    {
        $films = self::getFilms($watchlist);
        
        return view('watchlists.edit')->with(compact('films', 'watchlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * Used to change name of specified watchlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function update(Watchlist $watchlist, Request $request)
    {
        $watchlist->name = $request->input('name');
        $watchlist->save();
        return back()->with('success', 'Watchlist Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watchlist $watchlist, Request $request)
    {
        $watchlistID = $request->watchlist;

        Filmwatchlist::where('watchlist_id', $watchlistID)->delete();

        Watchlist::where('id', $watchlistID)->delete();
        
        return back()->with('success', 'Watchlist Deleted');
    }

    // Add film to watchlist
    public function addFilm(Request $request)
    {

        // Check if film is already in selected watchlist
        $filmInsideWatchlist = Filmwatchlist::where([
            'watchlist_id' => $request->watchlist_id,
            'movie_id' => $request->movie_id
            ])->first();

        // If film is already in watchlist return with error message
        if ($filmInsideWatchlist) {
            return back()->with('error', 'Movie is already in watchlist');
        }


        $film = Film::where('movie_id', $request->movie_id)->first();

        // If film is not already in DB, add it to DB
        if ($film === null) {
            $film = new Film;

            $film->title = $request->title;
            $film->poster_path = $request->poster_path;
            $film->movie_id = $request->movie_id;

            $film->save();
        }
        
        // Add the film to selected watchlist
        $filmWatchlist = new Filmwatchlist;
        $filmWatchlist->movie_id = $film->movie_id;
        $filmWatchlist->watchlist_id = $request->watchlist_id;
        $filmWatchlist->save();

        return back()->with('success', 'Movie added to watchlist!');
    }

    // Remove film from watchlist
    public function removeFilm(Watchlist $watchlist, Request $request)
    {
        $movie_id = $request->movie_id;
        Filmwatchlist::where('movie_id', $movie_id)->delete();

        // Gets all film objects for this watchlist (using helper method)
        $films = self::getFilms($watchlist);

        return back()->with(compact(['success' => 'Movie Deleted!'], 'films', 'watchlist'));
    }

    // Returns all films from a watchlist
    public function getFilms(Watchlist $watchlist)
    {
        // Gets which films are in watchlist
        $filmRelations = FilmWatchlist::where('watchlist_id', $watchlist->id)->get();

        // Creates an array and put movie ids in
        $movieIdList = [];
                
        foreach ($filmRelations as $filmRelation) {
            $movieIdList[] = $filmRelation->movie_id;
        };

        // Gets film objects
        $films = Film::find($movieIdList);

        // Returns array with film objects
        return $films;
    }
}
