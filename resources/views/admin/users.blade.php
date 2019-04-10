@extends('welcome')

@section('content')
    

<h2>Users</h2>
<form method="POST" action="{{ action('AdminController@deleteUser') }}">
        @method('DELETE')
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Email verified at</th>
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
        
        <a href="/admin">Go Back</a>
        @endsection