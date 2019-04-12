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
        return view('watchlist')->with('userWatchlists', $userWatchlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('watchlistform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film;

        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;
        $film->save();
        
        $watchlistId = $request->watchlist_id;
        $currentWatchlistId = 5;
        $film = Film::all()->last();
        $film->watchlist()->attach($watchlistId);
        return redirect('/watchlist');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function show(Watchlist $watchlists)
    {
        //
        $users = Watchlist::select('movie_info')->where('id', 1)->get();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlists, Request $request)
    {
        // return 123;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watchlist $watchlists)
    {
        $watchlistID = $request->id;
        $watchlist = Watchlist::where('id', $watchlistID)->first();
        $watchlist->name = $request->input('name');
        $watchlist->save();
        return redirect('/watchlist')->with('success', 'Watchlist Updated!');
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

    public function loadSelectedWatchlist(Request $request)
    {
        $selectedWatchlist = $request->watchlists;
        $watchlist = FilmWatchlist::where('watchlist_id', $selectedWatchlist)->get();
      
        $movieIds = [];
        foreach ($watchlist as $movie) {
            array_push($movieIds, $movie->film_id);
        }
      
        $filmsFromWatchlist = Film::whereIn('id', $movieIds)->get();
        

        return view('showselectedwatchlist')->with('filmsFromWatchlist', $filmsFromWatchlist);
    }

    public function saveWatchlist(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $userId = Auth::id();
        $watchlist = new Watchlist;
        $watchlist->user_Id = $userId;
        $watchlist->name = $request->name;
        $watchlist->save();
        return redirect('/watchlist')->with('success', 'Watchlist Created!');
    }

    public function deleteMovie(Request $request)
    {
        // dd($request);
        $movie_id = $request->id;
        Filmwatchlist::where('film_id', $movie_id)->delete();
        Film::where('id', $movie_id)->delete();
        return back()->with('success', 'Movie Deleted!');
    }

    // public function deleteWatchlist(Request $request)
    // {
    //    return 123;
    // }

    public function editWatchlist(Request $request)
    {
        $watchlistID = $request->watchlists;
        $watchlist = Watchlist::where('id', $watchlistID)->get()->all();
        unset($watchlistArr);
        return view('watchlists.edit')->with('watchlist', $watchlist);
    }
}
