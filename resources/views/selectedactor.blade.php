@extends('welcome')

@section('content')
<?php
dd($movies)
?>
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




<div class="col">
<div class="">
@foreach ($movies as $movie)
<div class="row text-left">
  <ul class="row">
    <li>
      <a class="mx-3 row" href="{{ url('selectedfilm/' .$movie->id. '/') }}">
      <p class="mx-3">{{$movie->release_date}}</p>
      <p>{{$movie->title}}</p>
      </a>
      </li>
      <p class="">{{$movie->character}}</p>
  </ul>
  </div>
@endforeach
</div>
</div>

@endsection