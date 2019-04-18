@extends('welcome')

@section('content')
<div class="row justify-content-center absolute">
    <div>
        <img src="http://image.tmdb.org/t/p/w1280/{{ $body->backdrop_path }}" alt="Movie Backdrop">
    </div>
</div>

<div class="row justify-content-center my-5">

    <div class="col-md-8 text-center">

        <div class="card card-default">
            <div class="card-header">
                <h1>{{ $body->title }}</h1>
            </div>
            <div class="card-body justify-content-center">
                <p> {{ $body->overview }}</p>
                <img src="http://image.tmdb.org/t/p/w185/{{ $body->poster_path }}" alt="Movie Image">
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <?php $count = 0; ?>
    @foreach ($credits->cast as $cast)
    @if ($count == 5)
    @break
    @endif
    <div class="mx-4">
        <p>{{ $cast->character }}</p>
        <p>{{ $cast->name }}</p>
        <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img
                src="http://image.tmdb.org/t/p/w185/{{ $cast->profile_path }}" alt="Photo of actor"></a>
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
                <option value="{{ $watchlist->id  }}">{{ $watchlist->name }}
                </option>
                @endforeach
            </select>
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <input name="movie_id" type="hidden" value="{{ $body->id }}" />
            <input name="title" type="hidden" value="{{ $body->title }}" />
            <input name="poster_path" type="hidden" value="{{ $body->poster_path }}" />
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


        @include('reviews.showReviews')


        @auth
        @include('reviews.createReviewsForm')
        @endauth

        @endsection
