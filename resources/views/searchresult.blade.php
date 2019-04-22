@extends('welcome')

@section('content')
@if(isset($body->results))
<div class="row justify-content-center text-center my-5 bgpicture">
    @foreach ($body->results as $result)
        <div class="col-md-2 text-center">
            <a href="{{ url("selectedfilm/{$result->id}") }}">
                <img
                src="{{ url("http://image.tmdb.org/t/p/w185/{$result->poster_path}") }}">
            </a>
            <h4>{{$result->title}} </h4>
        </div>
    @endforeach
    </div>

   
@else
    <h1>Didnt work</h1>
@endif 
@endsection
