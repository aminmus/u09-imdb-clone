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
        return back()->with('success', 'Watchlist Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function show(Watchlist $watchlist)
    {
        // 1. Gets which films are in watchlist
        $filmRelations = FilmWatchlist::where('watchlist_id', $watchlist->id)->get();

        
        //2. Creates an array and put movie ids in
        $movieIdList = [];
        
        foreach ($filmRelations as $filmRelation) {
            $movieIdList[] = $filmRelation->movie_id;
        };
        
        // 3. Gets the film objects
        $films = Film::find($movieIdList);

        // 4. Sends film objects to returned view
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
        return view('watchlists.edit')->with('watchlist', $watchlist);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Watchlist $watchlist)
    // {
    //     $watchlistID = $request->id;
    //     $watchlist = Watchlist::where('id', $watchlistID)->first();
    //     $watchlist->name = $request->input('name');
    //     $watchlist->save();
    //     return back()->with('success', 'Watchlist Updated!');
    // }

    public function update(Request $request, Watchlist $watchlist)
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
    public function destroy(Watchlist $watchlists, Request $request)
    {
        $watchlistID = $request->watchlists;
        Watchlist::where('id', $watchlistID)->delete();
        return back()->with('success', 'Watchlist Deleted');
    }

    // public function loadSelectedWatchlist(Request $request)
    // {
    //     $selectedWatchlist = $request->watchlists;
    //     $watchlist = FilmWatchlist::where('watchlist_id', $selectedWatchlist)->get();
      
    //     $movieIds = [];
    //     foreach ($watchlist as $movie) {
    //         array_push($movieIds, $movie->movie_id);
    //     }
      
    //     $filmsFromWatchlist = Film::whereIn('id', $movieIds)->get();
        

    //     return view('showselectedwatchlist')->with('filmsFromWatchlist', $filmsFromWatchlist);
    // }

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

    public function deleteMovie(Request $request)
    {
        // dd($request);
        $movie_id = $request->id;
        Filmwatchlist::where('movie_id', $movie_id)->delete();
        Film::where('id', $movie_id)->delete();
        return back()->with('success', 'Movie Deleted!');
    }

    public function editWatchlist(Request $request)
    {
        $watchlistID = $request->watchlists;
        $watchlist = Watchlist::where('id', $watchlistID)->get()->all();
        unset($watchlistArr);
        return view('watchlists.edit')->with('watchlist', $watchlist);
    }
}
