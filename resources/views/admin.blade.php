@extends('welcome')

@section('content')

<div class="container-fluid">

    <div>
        <h1>Admin</h1>
    </div>

    <div class="card-deck">
        <div class="card mb-4">
            <a href="/admin/reviews">
                <div class="card-body">
                    <h4 class="card-title">Reviews</h4>
                    <p class="card-text">View Reviews</p>
                </div>
            </a>
        </div>

        <div class="card mb-4">
            <a href="/admin/users">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-text">View Users</p>
                </div>
            </a>
        </div>

        <div class="card mb-4">
            <a href="/admin/watchlists">
                <div class="card-body">
                    <h4 class="card-title">Watchlists</h4>
                    <p class="card-text">View Watchlists</p>
                </div>
            </a>
        </div>




    </div>

    @endsection
