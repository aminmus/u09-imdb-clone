



@foreach ($filmsFromWatchlist as $film)

<h1>{{$film->title}} </h1>
<p>  {{$film->id}}<p>
<img src="http://image.tmdb.org/t/p/w185/<?php echo $film->poster_path;?>">

@endforeach