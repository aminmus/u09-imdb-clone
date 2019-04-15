@extends('welcome')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <h1>My Reviews</h1>
  </div>
</div>

@include('reviews.showReviews')

@endsection
