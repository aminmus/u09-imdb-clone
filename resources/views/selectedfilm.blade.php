@extends('welcome')


    
@section('content')

    
    <div style="background-image: url('http://image.tmdb.org/t/p/w1280/<?php echo $body->backdrop_path;?>')"class="row justify-content-center absolute filmhero">
        <div class="posterpath justify-content-center">
              <div class="poster">
                  <img src="http://image.tmdb.org/t/p/w342/<?php echo $body->poster_path;?>">
              </div>
              <div class="movietext">
                  <h1>{{$body->title}} </h1>
                  <div class="flex">
                        @foreach ($body->genres as $genre)
                        <p class="mr-2">{{$genre->name}}</p>
                        @endforeach
                  </div>
                  <p>{{$body->release_date}}<p>
                  <p>{{$body->overview}}<p>
                  <p> {{$body->vote_average}}<p>
                  <form method="POST" action="{{ action('WatchlistController@store') }}">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
                  <input name="title" type="hidden" value="<?php echo $body->title;?>"/>
                  <input name="poster_path" type="hidden" value="<?php echo $body->poster_path;?>"/>
                  <button type="submit">Save Movie</button>
                  </form>
              </div>
              <div class="trailer">
                  <iframe width="420" height="315" src="//www.youtube.com/embed/<?php echo $trailer->key ;?>" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class=""><h1>Cast</h1></div>
        </div>
    </div>
    


@endsection
