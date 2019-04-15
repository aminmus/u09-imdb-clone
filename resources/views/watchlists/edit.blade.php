@extends('welcome')

@section('content')
    
<h1>Edit Watchlist</h1>
<form method="POST" action="/watchlists/{{$watchlist->id}}">
    @csrf
    @method('PUT')
    <label for="name">Genre name:</label>
    <input type="text" name="name" placeholder="{{$watchlist->name}}">
    <!-- <input type="hidden" name="id" value="{{$watchlist->id}}"> -->
    <button type="submit">Submit</button>
</form>
@endsection
