@extends('welcome')

@section('content')
<h1>Create Watchlist</h1>
<form method="POST" action="/watchlists">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <label for="name">Watchlist name:</label>
    <input id="name" type="text" name="name" placeholder="name">
    <button type="submit">Submit</button>
</form>
@endsection
