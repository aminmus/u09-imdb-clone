@extends('welcome')

@section('content')
    <div class="container my-5">
      <div class="mx-3">
        <img src="http://image.tmdb.org/t/p/w185/<?php echo $actor->profile_path;?>" alt="">
      </div>
      <div class="mx-3">
        <h3>{{$actor->name}}</h3>
        <p>{{$actor->birthday}}</p>
        <p>{{$actor->biography}}</p>
        <p><b>{{$actor->place_of_birth}}</b></p>
      </div>
      </div>
<h1 class="text-center">Filmography</h1>
<div class="row justify-content-center text-center my-5 ">
    @foreach ($movies as $movie)
        <div class="col-md-2 text-center">
            <a href="{{ url("selectedfilm/{$movie->id}") }}">
                <img
                src="{{ url("http://image.tmdb.org/t/p/w185/{$movie->poster_path}") }}">
            </a>
            <h4>{{$movie->title}} </h4>
            <p class="">{{$movie->character}}</p>
        </div>
    @endforeach
    </div>
@endsection