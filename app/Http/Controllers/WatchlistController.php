<?php

namespace App\Http\Controllers;

use App\Watchlist;
use Illuminate\Http\Request;

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
        return view('watchlists.index')->with('watchlists', $watchlists);
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
        //
       /*  var_dump($request); */
        $watchlists = new Watchlist;

        $watchlists->movie_id = $request->movie_id;
        $watchlists->title = $request->title;
        $watchlists->poster_path = $request->poster_path;


        $watchlists->save();
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
}
