@extends('welcome')


@section('content')

   @foreach ($filmsFromWatchlist as $film)
       <h1>{{$film->title}}</h1>
       <p>{{$film->movie_id}}</p>
       <img src="http://image.tmdb.org/t/p/w185/{{$film->poster_path}}">
       <form method="POST" action="/deletemovie/{{$film->movie_id}}">
           @method('DELETE')
           @csrf
           <button class="btn btn-danger mt-2"type="submit">Delete</button>
       </form>
       <hr>

   @endforeach
@endsection