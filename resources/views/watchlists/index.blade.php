@extends('welcome')


@section('content')
<button><a href="watchlist/create">Create New Watchlist</a></button>

<h1>Select Watchlist</h1>
<form method="GET" action="/watchlists/69">
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
</form>
@endsection

<!---  Refaktorisera ovanstående formulär till att göra en submit när man väljer en select "onchange"-> fire submit -->
