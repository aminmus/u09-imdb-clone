@extends('welcome')

@section('content')

<div class="container">
        @foreach ($popularMovies->results as $movie)
        <div class="col">
        <a href="{{ url('showmovie/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
        </div>
        @endforeach
        
</div>
@endsection

        
                    