@extends('welcome')

@section('content')
<h1>Create Watchlist</h1>
<form method="POST" action="/watchlist">
    @csrf
    <input type="hidden" name="user_id" value="<?php echo(Auth::user()->id); ?>">
    <label for="name">Genre name:</label>
    <input type="text" name="name" placeholder="genre">
    <button type="submit">Submit</button>
</form>
@endsection
