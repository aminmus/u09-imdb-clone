@extends('welcome')

@section('content')
<h1 class="text-center">Top 5 Movies</h1>
<div class="container">
       
        <?php $count = 0; ?>
        @foreach ($popularMovies->results as $movie)
        <?php if($count == 5) break; ?>
        <div class="col">
        <a href="{{ url('showmovie/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
        </div>
        <?php $count++; ?>
        @endforeach
        
</div>
@endsection

        
                    