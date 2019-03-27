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
       
        /* $watchlist = new Watchlist;
        $watchlist->movie_id = $request->movie_id;
        $watchlist->title = $request->title;
        $watchlist->poster_path = $request->poster_path; */
        
        /* $array = array($request->movie_id,$request->titl$request->poster_path;) */
        /* $film = new Film;
        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;

        $ifexists = Film::where('movie_id', $film->movie_id)->exists();
        var_dump($ifexists); 
        
        if ($ifexists) {
            dd('movie alrdy exists');

        } else {
            echo 'Movie added';
            $film->save();
        } */

        $film = new Film;

        $film->title = $request->title;
        $film->poster_path = $request->poster_path;
        $film->movie_id = $request->movie_id;
        $film->save();
        
        $watchlist = new Watchlist;
        $watchlist->name = $request('name');
        $watchlist->save();
        return redirect('/watchlist');
        
        $currentWatchlistId = 5;
        $film = Film::all()->last();
        $film->watchlist()->attach(1);
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
<<<<<<< HEAD
   {
       // dd($request->name);

       $watchlist = new Watchlist;

       $watchlist->name = $request->name;
       $watchlist->save();
       return redirect('/watchlist');
   }
=======
    {
        // dd($request->name);
        
        $watchlist = new Watchlist;

        $watchlist->name = $request->name;
        $watchlist->save();
        return redirect('/watchlist');
    }
>>>>>>> 545300cf1632963057cf36cc47478ef5af7cc0c2
}
