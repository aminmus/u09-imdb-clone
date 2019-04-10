@extends('welcome')


@section('content')

   @foreach ($filmsFromWatchlist as $film)
       <h1>{{$film->title}}</h1>
       <p>{{$film->movie_id}}</p>
       <a href="{{ url('selectedfilm/' .$film->movie_id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $film->poster_path;?>"> </a>
       <form method="POST" action="/deletemovie/{{$film->id}}">
           @method('DELETE')
           @csrf
           <button class="btn btn-danger mt-2"type="submit">Delete From Watchlist</button>
       </form>

       <hr>
       


   @endforeach
@endsection