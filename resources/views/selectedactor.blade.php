
<img src="http://image.tmdb.org/t/p/w185/<?php echo $actor->profile_path;?>" alt="">
<h3>{{$actor->name}}</h3>
<p>{{$actor->birthday}}</p>
<p>{{$actor->biography}}</p>
<p>{{$actor->place_of_birth}}</p>

@foreach ($movies as $movie)
    <p>{{$movie->character}}</p>
    <p>{{$movie->release_date}}</p>
    <p></p>
    <p>{{$movie->title}}</p>
    <p>{{$movie->overview}}</p>
    <a href="{{ url('selectedfilm/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>" alt=""></a>
@endforeach