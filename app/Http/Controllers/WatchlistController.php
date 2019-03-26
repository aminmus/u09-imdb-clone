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
        $watchlist = Watchlist::all();
        return view('watchlist.index')->with('watchlist', $watchlist);
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
        /* $title = "Superman, Spiderman or Batman";
        $film_watchlist = Film::find($title);
        
        dd($film_watchlist); */

      /*   $test = 6;
        $film = Film::find(1);
        dd($film);
        $film->watchlist()->attach(1);  */
        
        $currentWatchlistId = 5;
        $film = Film::all()->last();
        $film->watchlist()->attach($currentWatchlsitId);
        /* dd($test2);
        
        $film = Film::where('id', $test2)->pluck('id'); */
        
        
        
        //this executes the insert-query
        /* $filmwatchlist = Film::where('id', 3);
        $filmwatchlist->watchlist()->attach(1)); */
        
        /* $filmwatchlist = new Filmwatchlist;
        $filmwatchlist->save(); */
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function show(Watchlist $watchlist)
    {
        //
        $users = Watchlist::select('movie_info')->where('id', 1)->get();
        
        /* echo $users; */
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlist)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watchlist $watchlist)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watchlist $watchlist)
    {
        //
    }

    public function test(Request $request) 
    {
        return view('externalfilm');
    }
}