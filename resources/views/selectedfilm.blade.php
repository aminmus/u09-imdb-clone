

@extends('welcome')


    
@section('content')
    <div class="row justify-content-center absolute">
    <div>
        <img src="http://image.tmdb.org/t/p/w1280/<?php echo $body->backdrop_path;?>" alt="">
        </div>
    </div>

<div class="row justify-content-center my-5">
    
  <div class="col-md-8 text-center">
    <div class="card card-default">
      <div class="card-header">
        <h1>{{$body->title}} </h1>
      </div>
      <div class="card-body justify-content-center">
        <p>  {{$body->overview}}<p>

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



<div class="container">    
  <div class="row justify-content-center">
    <?php $count = 0; ?>
      @foreach ($credits->cast as $cast)
    <?php if ($count == 5) {
    break;
} ?>
        <div>
          <p>{{$cast->character}}</p>
          <p>{{$cast->name}}</p>
          <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
          <?php $count++; ?>
        </div>
      @endforeach
    </div>
</div>

@auth
    @if(isset($userWatchlist))
    <div class="container">
    <div class="col justify-content-center">
    <form method="POST" action="{{ action('WatchlistController@store') }}">
    <select name="watchlist_id">
        @foreach ($userWatchlist as $watchlist)
        <option value="<?php echo $watchlist->id ;?>"><?php echo $watchlist->name ;?></option>
        @endforeach
    </select>
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
        <input name="title" type="hidden" value="<?php echo $body->title;?>"/>
        <input name="poster_path" type="hidden" value="<?php echo $body->poster_path;?>"/>
    <button type="submit">Save Movie</button>
    
    </form> 
    @else
    <div class="container">
        <h1>No watchlists, why dont you create some!</h1>
        <button class="btn btn-link"><a href="/watchlist/create">Create Watchlist</a></button>
        <hr>
        </div>
    @endif
@endauth

<div class="row justify-content-center">
@guest
    <h1>Create an account to create watchlists</h1>
@endguest
</div>


<div class="container">
<div class="justify-content-center row">
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Watchlists
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div>
<div>

<h1>REVIEWS</h1>
 @foreach ($reviews as $review)
 <div class="container card my-3">
  <div class="row justify-content-center">
     <h1>{{$review->content}}</h1>
     <h1>{{$review->rating}}</h1>
     <h1>{{$review->user_id}}</h1>
     <hr>
@auth
    
  </div>
@if(Auth::user()->id === $review->user_id)
    <form class="d-inline"method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
  </div>
  </div>
  </div>
@endif
@endauth

 @endforeach
 
 


 <!-- Här behövs det visas kommentarer för specifik film
 Ladda in reviews. -->
@auth
    @include('reviews') 
@endauth



@endsection
