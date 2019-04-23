@extends('welcome')

@section('content')

  <div class="bgpicture">
  </div>
  <div class="row">
      <div class="col-md-12 text-center ">
    
          <h1 class="text-center">Top 5 Movies</h1>
        </div>
        <div class="card-body justify-content-center my-5">
            <div class="container d-flex my-5">  
                <?php $count = 0; ?>
                 @foreach ($popularMovies->results as $movie)
                 @if ($count == 5)
                  @break 
                  @endif
                <div class="col">
                <a href="{{ url('selectedfilm/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
                </div>
                <?php $count++; ?>
                @endforeach
      
          </div>
    </div>
  </div>
@endsection

        
                    
