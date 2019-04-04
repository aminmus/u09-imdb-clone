@extends('welcome')

@section('content')

<div>
    <h1>Admin</h1>
</div>

@include('admin.reviews')
@include('admin.users')

@endsection
