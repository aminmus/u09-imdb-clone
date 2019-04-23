@extends('welcome')


    
@section('content')
<div style="background-image: url('http://image.tmdb.org/t/p/w1280/<?php echo $body->backdrop_path;?>')"class="row justify-content-center absolute filmhero">
    <div class="posterpath justify-content-center">
        <div class="poster">
            <img src="http://image.tmdb.org/t/p/w342/<?php echo $body->poster_path;?>">
        </div>
        <div class="movietext">
            <h1 class="mt-1"><?php echo strtoupper($body->title);?></h1>
            <p>{{$body->release_date}}<p>
            <div class="flex mb-2">
                @foreach ($body->genres as $genre)
                <a class="mr-2 btn btn-info" href="{{ url('genresearch/' .$genre->id. '/') }}">{{$genre->name}}</a>
                @endforeach
            </div>
            <p>{{$body->overview}}<p>
            <p>Rating - {{$body->vote_average}}<p>
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
                    <p><b>Create an account to create watchlists</b></p>
                </div>
                @endguest
        </div>
        <div class="resp-container trailer">
            <iframe class="resp-iframe" src="//www.youtube.com/embed/<?php echo $trailer->key ;?>" gesture="media" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="cast"><h1>Cast</h1></div>
        <div class="actors pt-5">
            <?php $count = 0; ?>
            @foreach ($credits->cast as $cast)
            @if ($count == 5)
                @break
            @endif
            <div>
                <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
                <p class="pt-1">{{$cast->name}} - {{$cast->character}}</p>
                <?php $count++; ?>
            </div>
            @endforeach
        </div>
        <div class="createreviews">
                @auth
                    
                @include('reviews.createReviewsForm') 
                @endauth
            </div>
        <div class="reviewcontent">
                <!-- Reviews -->
                @include('reviews.showReviews')
        
                 <!-- Här behövs det visas kommentarer för specifik film
                 Ladda in reviews. -->
        </div>
    </div>
</div>
 

@endsection
