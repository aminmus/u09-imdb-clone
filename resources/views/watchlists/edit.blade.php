@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <form action="/watchlists/{{ $watchlist->id }}" method="post">
                @method('PATCH')
                @csrf
                <label for="name">Watchlist name</label>
                <input id="name" name="name" value="{{ $watchlist->name }}" type="text"
                    placeholder="{{ $watchlist->name }}">
                <button type="submit" class="btn btn-secondary">Change name</button>
            </form>
        </div>

        <div class="card-body">
            <div class="list-group">
                @if ($films->isEmpty())
                <p class="list-group-item">Watchlist is empty</p>

                @else
                @foreach ($films as $film)
                <div class="list-group-item list-group-item-action d-flex">
                    <a href="{{ url("selectedfilm/{$film->movie_id}") }}">{{ $film->title }}

                        {{-- <img src="{{ url("http://image.tmdb.org/t/p/w185/{$film->poster_path}") }}">
                        Not sure if image should be here
                        --}}

                    </a>

                    <form action="/removefilm/{{ $film->movie_id }}" method="post">
                        @method('DELETE')
                        @csrf

                        <input type="hidden" name="movie_id" value="{{ $film->movie_id }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                @endforeach
                @endif
            </div>
        </div>
            <a class="btn btn-primary" href="{{ route('watchlists.show', ['watchlist' => $watchlist->id]) }}">Done</a>
    </div>
</div>
@endsection
