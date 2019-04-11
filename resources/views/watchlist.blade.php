@extends('welcome')


@section('content')
<button><a href="watchlist/create">Create New Watchlist</a></button>
    
<h1>Select Watchlist</h1>
 <form method="GET" action="{{ action('WatchlistController@loadSelectedWatchlist') }}" >
    <select name="watchlists">
    @foreach ($userWatchlists as $watchlist)
    <option value="<?php echo $watchlist->id;?>"><?php echo $watchlist->name;?></option>

    @endforeach
    
    </select>
    <button type="submit">Show Watchlist</button>
</form>

<h1>Delete Watchlist</h1>
<form action="watchlist/delete" method="POST">
    @method('DELETE')
    @csrf
    <select name="watchlists">
    @foreach ($userWatchlists as $watchlist)
    <option value="{{$watchlist->id}}">{{$watchlist->name}}</option>
    @endforeach
    </select>
    <button type="submit">Delete</button>
</form>
@endsection

<!---  Refaktorisera ovanstående formulär till att göra en submit när man väljer en select "onchange"-> fire submit -->

