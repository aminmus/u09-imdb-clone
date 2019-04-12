@extends('welcome')

@section('content')
    
<h1>Edit Watchlist</h1>
<form method="POST" action="/watchlist/{{$watchlist[0]->id}}">
    @csrf
    @method('PUT')
    <label for="name">Genre name:</label>
    <input type="text" name="name" placeholder="{{$watchlist[0]->name}}">
    <input type="hidden" name="id" value="{{$watchlist[0]->id}}">
    <button type="submit">Submit</button>
</form>
@endsection
