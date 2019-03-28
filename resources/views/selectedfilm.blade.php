

@extends('welcome')


        

       


@section('content')

<div class="row justify-content-center my-5">
  <div class="col-md-8 text-center">
    <div class="card card-default">
      <div class="card-header">
        <h1>{{$body->title}} </h1>
      </div>
      <div class="card-body justify-content-center">
        <p>  {{$body->id}}<p>
        <p>  {{$body->budget}}<p>
        <p>  {{$body->overview}}<p>
        <p>  {{$body->popularity}}<p>

        <img src="http://image.tmdb.org/t/p/w185/<?php echo $body->poster_path;?>">
        <form method="POST" action="{{ action('WatchlistController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
        <input name="title" type="hidden" value="<?php echo $body->title;?>"/>
        <input name="poster_path" type="hidden" value="<?php echo $body->poster_path;?>"/>
        <button type="submit">Save Movie</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection