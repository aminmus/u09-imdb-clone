<h2>Reviews</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">content</th>
            <th scope="col">rating</th>
            <th scope="col">created at</th>
            <th scope="col">updated at</th>
            <th scope="col">film id</th>
            <th scope="col">user id</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)
        <tr>
            <th scope="row">{{$review["id"]}}</th>
            <td>{{$review["content"]}}</td>
            <td>{{$review["rating"]}}</td>
            <td>{{$review["created_at"]}}</td>
            <td>{{$review["updated_at"]}}</td>
            <td>{{$review["film_id"]}}</td>
            <td>{{$review["user_id"]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
