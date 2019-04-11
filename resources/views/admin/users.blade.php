@extends('welcome')

@section('content')
    

<h2>Users</h2>
<form method="POST" action="{{ action('AdminController@deleteUser') }}">
        @method('DELETE')
        @csrf
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
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                
                <tr>
                    <th scope="row"> <input type="checkbox"
                        name="<?php echo $user["id"] ;?>"
                        value="<?php echo $user["id"] ;?>">
                        <?php echo $user["id"] ;?><br></th>
                        <td>{{$user["is_admin"]}}</td>
                        <td>{{$user["name"]}}</td>
                        <td>{{$user["email"]}}</td>
                        <td>{{$user["created_at"]}}</td>
                        <td>{{$user["updated_at"]}}</td>
                        <td>{{$user["email_verified_at"]}}</td>
                    </tr>
                    @endforeach
                    <input type="submit" value="Submit">
                </form>
            </tbody>
        </table>
        {{$users->links()}}
        <a href="/admin">Go Back</a>
        @endsection