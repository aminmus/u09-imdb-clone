@extends('welcome')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">My Watchlists</div>
        <div class="card-body">
            <div class="list-group">
                @foreach ($userWatchlists as $watchlist)
                <a href="{{ route('watchlists.show', $watchlist->id) }}"
                    class="list-group-item list-group-item-action">{{ $watchlist->name }}</a>
                @endforeach
            </div>
        </div>
        <a class="btn btn-primary" href="watchlists/create">Create New Watchlist</a>
    </div>
</div>

@endsection
