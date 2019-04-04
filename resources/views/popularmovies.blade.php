@extends('welcome')

@section('content')
  <div class="row justify-content-center my-5">
    <div class="col-md-12 text-center">
      <div class="card card-default">
        <div class="card-header">
          <h1 class="text-center">Top 5 Movies</h1>
        </div>
        <div class="card-body justify-content-center">
            <div class="container">
       
              <?php $count = 0; ?>
              @foreach ($popularMovies->results as $movie)
              <?php if($count == 5) break; ?>
              <div class="col">
              <a href="{{ url('selectedfilm/' .$movie->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $movie->poster_path;?>"> </a>
              </div>
              <?php $count++; ?>
              @endforeach
      
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

        
                    