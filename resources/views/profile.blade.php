@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h1>{{Auth::user()->name}}</h2>

                <!-- User Menu -->
                <div>
                    <ul>
                        <li><a href="{{ url('/watchlist') }}">Watchlists</a></li>

                        <!-- TODO: Add hrefs to views below when they are created  -->
                        <li><a href="#">Reviews (coming soon)</a></li>
                        <li><a href="#">Account Settings (coming soon)</a></li>

                        @if (Auth::user()->is_admin)
                        <li><a href="#">Administration (coming soon)</a></li>
                        @endif

                    </ul>
                </div>
        </div>
    </div>
</div>
@endsection
