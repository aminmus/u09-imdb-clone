@extends('welcome')

@section('content')

<h1 class="py-5 px-5 text-center">Profile Dashboard {{Auth::user()->name}}</h1>
<div class="mx-5 my-5">
<div class="card-deck">
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title"><li><a href="{{ url('/watchlists') }}">Watchlists</a></li></h4>
      <p class="card-text">Browse, edit and update your personal watchlists here!</p>
      <button type="button" class="btn btn-light-blue btn-md">---></button>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title"><li><a href="{{ url('/profile/reviews')}}">Reviews</a></li></h4>
      <p class="card-text">Overview and manage your own reviews for specific movies here!</p>
      <button type="button" class="btn btn-light-blue btn-md">---></button>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title"><li><a href="#">Account Settings (coming soon)</a></li></h4>
      <p class="card-text">Personal interface settings and more!</p>
      <button type="button" class="btn btn-light-blue btn-md">---></button>
    </div>
  </div>

@if (Auth::user()->is_admin)
  <div class="card mb-4"> 
    <div class="card-body">
      <h4 class="card-title"><li><a href="/admin">Administration</a></li></h4>
      <p class="card-text">Administration controls and settings!</p>
      <button type="button" class="btn btn-light-blue btn-md">---></button>
    </div>
  </div>
  @endif
</div>
</div>
@endsection
