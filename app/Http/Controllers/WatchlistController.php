<?php

namespace App\Http\Controllers;

use App\Watchlist;
use App\Film;
use App\Filmwatchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allWatchlists = Watchlist::all();
        
        
        return view('watchlist')->with('allWatchlists', $allWatchlists);
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
        
        /* $film = new Film;

        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;
        $film->save();
        
        $userId = Auth::id();
        $watchlist = new Watchlist;
        $watchlistId = $request->watchlist_id;
        Watchlist::find()
        Watchlist::where('id', $watchlistId)
        $watchlist->name = 'mayb this';
        $watchlist->user_id = $userId
        $watchlist->save();
        
        $watchlist = $request->input();
        
        $currentWatchlistId = 5;
        $film = Film::all()->last();
        $film->watchlist()->attach(1);
        return redirect('/watchlist'); */

        $film = new Film;

        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;
        $film->save();
        
        /* $userId = Auth::id();
        $watchlist = new Watchlist; */
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
        
        /* echo $users; */
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlists)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Watchlist  $watchlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watchlist $watchlists)
    {
        //
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
        

        $userId = Auth::id();
        $watchlist = new Watchlist;
        $watchlist->user_Id = $userId;
        $watchlist->name = $request->name;
        $watchlist->save();
        return redirect('/watchlist');
    }

    public function deleteMovie(Request $request)
    {
       
       $movie_id = $request->id;
       Filmwatchlist::where('film_id', $movie_id)->delete();
    }
}
