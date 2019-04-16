@extends('welcome')

@section('content')
<div class="my-5 column text-center justify-content-center">   
<h1 class="my-5">Create Watchlist</h1>
<form method="POST" action="/watchlist">
    @csrf
    <input type="hidden" name="user_id" value="<?php echo(Auth::user()->id); ?>">
    <label for="name">Name your watchlist : </label>
    <input type="text" name="name" placeholder="here">
    <button type="submit">Submit</button>
</form>
</div>
@endsection
