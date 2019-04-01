@extends('welcome')

@section('content')
@foreach ($filmsFromWatchlist as $film)

    <div class="row justify-content-center text-center my-5">
      <div class="col-md-8 text-center">
        <div class="card card-default">
          <div class="card-header">
            <h1>{{$film->title}}</h1>
          </div>
          <div class="card-body justify-content-center">
            <img src="http://image.tmdb.org/t/p/w185/<?php echo $film->poster_path;?>">
          </div>
        </div>
      </div>
    </div>

   

@endforeach

@endsection
