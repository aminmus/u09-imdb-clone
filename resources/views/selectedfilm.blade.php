

@extends('welcome')


    
@section('content')

<h1>{{$body->title}} </h1>
<p>  {{$body->id}}<p>
<p>  {{$body->budget}}<p>
<p>  {{$body->overview}}<p>
<p>  {{$body->popularity}}<p>

<img src="http://image.tmdb.org/t/p/w185/<?php echo $body->poster_path;?>">

@auth
    @if(isset($userWatchlist))
    <select>
        @foreach ($userWatchlist as $watchlist)
        <option value="<?php echo $watchlist->id ;?>"><?php echo $watchlist->name ;?></option>
        @endforeach
    </select>
        <form method="POST" action="{{ action('WatchlistController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
        <input name="title" type="hidden" value="<?php echo $body->title;?>"/>
        <input name="poster_path" type="hidden" value="<?php echo $body->poster_path;?>"/>
        <input name="watchlist_id" type="hidden" value="1"/>{{-- Make this dynamic  --}}
        <button type="submit">Save Movie</button>
        </form>
        <h1>You are logged in</h1>
    @else
        <h1>No watchlists, why dont you create some!</h1>
    @endif
@endauth

@guest
    <h1>Create an account to create watchlists</h1>
@endguest

{{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Watchlists
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div> --}}



@endsection