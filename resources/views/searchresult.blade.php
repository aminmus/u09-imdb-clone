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
                <a href="{{ url('selectedfilm/' .$result->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>"> </a>
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

