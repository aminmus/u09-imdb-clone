@extends('welcome')


@section('content')
<button><a href="watchlists/create">Create New Watchlist</a></button>

<h1>Watchlists</h1>
<!-- 
<div class="container">
    <div class="list-group">
        @foreach ($userWatchlists as $watchlist)
        <button href="{{ route('watchlists.show', $watchlist->id) }}" type="button"
            class="list-group-item list-group-item-action">{{ $watchlist->name }}</button>

        @endforeach
    </div>
</div> -->
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

<!-- <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button> -->

<!-- <div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        My Watchlists
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach ($userWatchlists as $watchlist)
        <a class="dropdown-item" href="{{ route('watchlists.show', $watchlist->id) }}">{{$watchlist->name}}</a>
        @endforeach
    </div>
</div> -->


<!-- <form method="GET" action="{{ url('watchlists/{$watchlist->id}') }}">
@csrf
<select name="watchlist">
    @foreach ($userWatchlists as $watchlist)
    <option value="{{ $watchlist->id }}">{{ $watchlist->name }}
    </option>

    @endforeach

</select>
<button type="submit">Show Watchlist</button>
</form> 

<h1>Edit Watchlist</h1>
<form action="/watchlists/{{$watchlist->id}}/edit" method="POST">
    @method('PUT')
    @csrf
    <select name="watchlist">
        @foreach ($userWatchlists as $watchlist)
        <option value="{{$watchlist->id}}">{{$watchlist->name}}</option>
        @endforeach
    </select>
    <button type="submit">
        Edit
    </button>
</form>


<h1>Delete Watchlist</h1>
<form action="watchlists/{}" method="POST">
    @method('DELETE')
    @csrf
    <select name="watchlists">
        @foreach ($userWatchlists as $watchlist)
        <option value="{{$watchlist->id}}">{{$watchlist->name}}</option>
        @endforeach
    </select>
    <button type="submit">Delete</button>
</form> -->
@endsection

<!---  Refaktorisera ovanstående formulär till att göra en submit när man väljer en select "onchange"-> fire submit -->
