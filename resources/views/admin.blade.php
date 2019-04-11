@extends('welcome')

@section('content')

<div>
    <h1>Admin</h1>
</div>

{{-- @include('admin.reviews') --}}
<a href="/admin/reviews">Reviews</a>
{{-- @include('admin.users') --}}
<a href="/admin/users">Users</a>
{{-- @include('admin.watchlists') --}}
<a href="/admin/watchlists">Watchlists</a>

@endsection
