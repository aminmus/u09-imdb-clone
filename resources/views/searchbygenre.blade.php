
@extends('welcome')


    
@section('content')
<div class="row justify-content-center text-center my-5 ">
    @foreach ($result->results as $movie)
        <div class="col-md-2 text-center">
            <a href="{{ url("selectedfilm/{$movie->id}") }}">
                <img
                src="{{ url("http://image.tmdb.org/t/p/w185/{$movie->poster_path}") }}">
            </a>
            <h4>{{$movie->title}} </h4>
        </div>
    @endforeach
</div>
   
@endsection