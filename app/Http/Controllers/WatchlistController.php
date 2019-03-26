<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watchlist;
use App\Film;
use App\Filmwatchlist;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watchlists = Watchlist::all();
        return view('watchlist.index')->with('watchlists', $watchlist);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        /* $watchlist = new Watchlist;
        $watchlist->movie_id = $request->movie_id;
        $watchlist->title = $request->title;
        $watchlist->poster_path = $request->poster_path; */
        
        /* $array = array($request->movie_id,$request->titl$request->poster_path;) */


        $film = new Film;

        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;
        $film->save();
        
        $watchlist = new Watchlist;
        $watchlist->name = "test";
        $watchlist->save();
        
        $currentWatchlistId = 5;
        $film = Film::all()->last();
        $film->watchlist()->attach($currentWatchlsitId);
        /* dd($test2);
        
        $film = Film::where('id', $test2)->pluck('id'); */
        
        /* $filmwatchlist = new Filmwatchlist;
        $filmwatchlist->save(); */
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

    public function test(Request $request) 
    {
        return view('externalfilm');
    }
}
