


@foreach ($filmsFromWatchlist as $film)
    <h1>{{$film->movie_id}}</h1>
    <h1>{{$film->title}}</h1>
    <img src="http://image.tmdb.org/t/p/w185/<?php echo $film->poster_path;?>">

   

@endforeach


