@extends('welcome')

@section('content')


<h2>Users</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">@sortablelink('id')</th>
            <th scope="col">@sortablelink('is_admin', 'Admin')</th>
            <th scope="col">@sortablelink('name')</th>
            <th scope="col">@sortablelink('email')</th>
            <th scope="col">@sortablelink('created_at', 'Created At')</th>
            <th scope="col">@sortablelink('updated_at', 'Updated At')</th>
            <th scope="col">@sortablelink('email_verified_at', 'Email Verified At')</th>
            <th><a href="/admin/add/user" class="btn btn-success">Add new user</a></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)

        <tr>
            <th scope="row"> {{$user['id']}}</th>
            <td>{{$user["is_admin"]}}</td>
            <td>{{$user["name"]}}</td>
            <td>{{$user["email"]}}</td>
            <td>{{$user["created_at"]}}</td>
            <td>{{$user["updated_at"]}}</td>
            <td>{{$user["email_verified_at"]}}</td>
            <td>
                <form action=" {{ action('AdminController@deleteUser', [$user['id']]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
                <button class="btn btn-primary" data-toggle="modal"
                    data-target="#editModal{{$user['id']}}">Edit</button>
            </td>
        </tr>
        @include('admin.modals.editUser')
        @endforeach

    </tbody>
</table>
{{ $users->links() }}
<a href="/admin">Go Back</a>
@endsection
