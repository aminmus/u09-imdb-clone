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




      <div class="row justify-content-center">
    <?php $count = 0; ?>
      @foreach ($credits->cast as $cast)
    <?php if ($count == 5) {
      break;
    } ?>
    <div class="justify-content-center column mx-4">

          <p>{{$cast->character}}</p>
          <p>{{$cast->name}}</p>
          <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>

      </div>
          <?php $count++; ?>
      @endforeach
      </div>

<div class="text-center align-items-center my-5">
<div class="justify-content-center">
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
<div class="row justify-content-center">
    <h1>Create an account to create watchlists</h1>
</div>
@endguest
</div>
</div>

<div>
<div class="justify-content-center row my-5">
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
    </div>
    </div>

<h1 class="text-center my-5">REVIEWS</h1>

<div class="justify-content-center text-center">
 @foreach ($reviews as $review)
<div>
<div class="row">
     <h3>{{$review->user_id}} user name</h3>
     <h3>{{$review->rating}} rating</h3>
     </div>
     <h4 class="text-left">{{$review->content}}</h4>
     <hr>
  </div>
@auth
    
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
  </div>
 
 


 <!-- Här behövs det visas kommentarer för specifik film
 Ladda in reviews. -->
 <div class="row my-5 justify-content-center">
@auth
    @include('reviews') 
@endauth
</div>


@endsection
