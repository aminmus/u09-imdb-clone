

@extends('welcome')


    
@section('content')
    <div>
        <img src="http://image.tmdb.org/t/p/w1280/<?php echo $body->backdrop_path;?>" alt="">
    </div>

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



    
    <?php $count = 0; ?>
@foreach ($credits->cast as $cast)
    <?php if($count == 5) break; ?>
    <p>{{$cast->character}}</p>
    <p>{{$cast->name}}</p>
    <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
    <?php $count++; ?>
@endforeach

<img src="http://image.tmdb.org/t/p/w185/<?php echo $body->poster_path;?>">

@auth
    @if(isset($userWatchlist))
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
        <h1>No watchlists, why dont you create some!</h1>
        <button class="btn btn-link"><a href="/watchlist/create">Create Watchlist</a></button>
        <hr>
    @endif
@endauth

@guest
    <h1>Create an account to create watchlists</h1>
@endguest



{{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Watchlists
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div> --}}


<hr>
 @foreach ($reviews as $review)
     <h1>{{$review->content}}</h1>
     <h1>{{$review->rating}}</h1>
     <h1>{{$review->user_id}}</h1>
     <hr>
@auth
    
@if(Auth::user()->id === $review->user_id)
    <form class="d-inline"method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <button type="submit" class="btn btn-primary">Edit</button>
    <hr>
@endif
@endauth

 @endforeach
 
 


 <!-- Här behövs det visas kommentarer för specifik film
 Ladda in reviews. -->
@auth
    @include('reviews') 
@endauth



@endsection
