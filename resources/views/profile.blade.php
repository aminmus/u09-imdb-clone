@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h2>{{Auth::user()->name}}</h2>

            <!-- User Menu -->
            <div>
                <ul>
                    <li><a href="#">Watchlists</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Account Settings</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
