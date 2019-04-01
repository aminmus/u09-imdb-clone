@extends('welcome')

@section('content')
@if(isset($body->results))
    @foreach ($body->results as $result)

   <div class="row justify-content-center text-center my-5">
    <div class="col-md-8 text-center">
        <div class="card card-default">
            <div class="card-header">
                <h1>{{$result->title}} </h1>
            </div>
            <div class="card-body justify-content-center">
                <!-- <p>  {{$result->id}}<p> -->
                <a href="{{ url('showmovie/' .$result->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>"></a>
                <form method="POST" action="{{ action('WatchlistController@store') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input name="movie_id" type="hidden" value="<?php echo $result->id;?>"/>
                <input name="title" type="hidden" value="<?php echo $result->title;?>"/>
                <input name="poster_path" type="hidden" value="<?php echo $result->poster_path;?>"/>
                <button class="my-3" type="submit">Save Movie</button>
                </form>
            </div>
        </div>
    </div>
   </div>


    <!-- <h1>{{$result->title}} </h1>
    <p>  {{$result->id}}<p>
    <a href="{{ url('showmovie/' .$result->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>"> </a> -->
    @endforeach
@else
    <h1>Didnt work</h1>
@endif 
@endsection

