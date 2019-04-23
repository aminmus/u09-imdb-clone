@extends('welcome')

@section('content')

  <div class="bgpicture">
  </div>
  <div class="text-center">
    
      <h1 class="text-center">Popular Movies</h1>
  </div>
  <div class="moviecontent">
      <div class="upcoming">
          <?php $count = 0; ?>
            @foreach ($upcoming->results as $movie)
            @if ($count == 3)
            @break 
            @endif
          <div class="col">
          <a href="{{ url('selectedfilm/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
          </div>
          <?php $count++; ?>
          @endforeach
      </div>
      <div class="nowplaying">
          <?php $count = 0; ?>
            @foreach ($nowplaying->results as $movie)
            @if ($count == 3)
            @break 
            @endif
          <div class="col">
          <a href="{{ url('selectedfilm/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
          </div>
          <?php $count++; ?>
          @endforeach
      </div>
  </div>
  
@endsection

        
                    
