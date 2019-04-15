@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ $watchlist->name }}
            <a class="btn btn-primary" href="{{ route('watchlists.edit', ['watchlist' => $watchlist->id]) }}">Edit
                watchlist</a>
        </div>
        <div class="card-body">
            <div class="list-group">
                @if ($films->isEmpty())
                <p class="list-group-item">Watchlist is empty</p>
                @else
                @foreach ($films as $film)
                <a href="{{ url("selectedfilm/{$film->movie_id}") }}"
                    class="list-group-item list-group-item-action">{{ $film->title }}

                    {{-- <img src="{{ url("http://image.tmdb.org/t/p/w185/{$film->poster_path}") }}">
                    Not sure if image should be here
                    --}}

                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
