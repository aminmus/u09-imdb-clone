@extends('welcome')

@section('content')
<button><a href="watchlists/create">Create New Watchlist</a></button>

<h1>Watchlists</h1>
<div class="container">
    <div class="card">
        <div class="card-header">Watchlists</div>
        <div class="card-body">
            <div class="list-group">
                @foreach ($userWatchlists as $watchlist)
                <a href="{{ route('watchlists.show', $watchlist->id) }}"
                    class="list-group-item list-group-item-action">{{ $watchlist->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
