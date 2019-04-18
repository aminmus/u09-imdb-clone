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
        <p>  {{$body->vote_average}}<p>
        @foreach ($body->genres as $genre)
            <p>{{$genre->name}}</p>
        @endforeach

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
<!-- <?php $count = 0; ?>
@foreach ($credits->cast as $cast)
    @if ($count == 5)
        @break
    @endif
    <p>{{$cast->character}}</p>
    <p>{{$cast->name}}</p>
    <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
    {{-- <?php $count++; ?> --}}
  @endforeach -->




      <div class="row justify-content-center">
    <?php $count = 0; ?>
    @foreach ($credits->cast as $cast)
    @if ($count == 5)
        @break
    @endif
    <div class="mx-4">
    <p>{{$cast->character}}</p>
    <p>{{$cast->name}}</p>
    <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
    <?php $count++; ?>
      </div>
@endforeach

      </div>

<div class="text-center align-items-center my-5">
<div class="justify-content-center">
@auth
    @if(isset($userWatchlist))
    <form method="POST" action="{{ action('WatchlistController@addFilm') }}">
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
    <a href="/watchlists/create" class="btn btn-link">Create Watchlist</a>
    <a class="btn btn-link" href="/watchlists">Show Watchlists</a>
    
    </form> 
    @else

        <h1>No watchlists, why dont you create some!</h1>
        <button class="btn btn-link"><a href="/watchlists/create">Create Watchlist</a></button>
        <hr>

    @endif
@endauth

@guest
<div class="row justify-content-center">
    <h1>Create an account to create watchlists</h1>
</div>
@endguest
    
<!-- Reviews -->
@include('reviews.showReviews')
@include('inc.messages')



 <!-- Här behövs det visas kommentarer för specifik film
 Ladda in reviews. -->
@auth

    @include('reviews.createReviewsForm') 
@endauth


@endsection
