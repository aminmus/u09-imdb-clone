@extends('welcome')

@section('content')

<h1 class="py-5 px-5 text-center">Profile Dashboard {{Auth::user()->name}}</h1>

<!-- Card deck -->
<div class="card-deck py-5 px-5">

  <!-- Card -->
  <div class="card mb-4">

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title"><li><a href="{{ url('/watchlist') }}">Watchlists</a></li></h4>
      <!--Text-->
      <p class="card-text">Browse, edit and update your personal watchlists here!</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">---></button>

    </div>

  </div>
  <!-- Card -->

  <!-- Card -->
  <div class="card mb-4">


    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title"><li><a href="{{ url('/profile/reviews')}}">Reviews</a></li></h4>
      <!--Text-->
      <p class="card-text">Overview and manage your own reviews for specific movies here!</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">---></button>

    </div>

  </div>
  <!-- Card -->

  <!-- Card -->
  <div class="card mb-4">

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title"><li><a href="#">Account Settings (coming soon)</a></li></h4>
      <!--Text-->
      <p class="card-text">Personal interface settings and more!</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">---></button>

    </div>

  </div>
  <!-- Card -->

@if (Auth::user()->is_admin)
  <!-- Card -->
  <div class="card mb-4"> 
    <!--Card content-->
    <div class="card-body">
      <!--Title-->
      <h4 class="card-title"><li><a href="/admin">Administration</a></li></h4>
      <!--Text-->
      <p class="card-text">Administration controls and settings!</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">---></button>
    </div>
  </div>
  <!-- Card -->
  @endif
</div>
<!-- Card deck -->

@endsection
