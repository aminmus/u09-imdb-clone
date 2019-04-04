<h2>Users</h2>
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
            <th scope="row">{{$user["id"]}}</th>
            <td>{{$user["is_admin"]}}</td>
            <td>{{$user["name"]}}</td>
            <td>{{$user["email"]}}</td>
            <td>{{$user["created_at"]}}</td>
            <td>{{$user["updated_at"]}}</td>
            <td>{{$user["email_verified_at"]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
