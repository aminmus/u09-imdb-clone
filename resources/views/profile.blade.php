@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h1>{{Auth::user()->name}}</h2>

                <!-- User Menu -->
                <div>
                    <ul>
                        <li><a href="{{ url('/watchlists') }}">Watchlists</a></li>

                        <!-- TODO: Add hrefs to views below when they are created  -->
                        <li><a href="{{ url('/profile/reviews')}}">Reviews</a></li>
                        <li><a href="#">Account Settings (coming soon)</a></li>

                        @if (Auth::user()->is_admin)
                        <li><a href="/admin">Administration</a></li>
                        @endif

                    </ul>
                </div>
        </div>
    </div>
</div>
@endsection
