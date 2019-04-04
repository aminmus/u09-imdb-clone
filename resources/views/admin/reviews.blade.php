<h2>Reviews</h2>
<form method="POST" action="{{ action('AdminController@deleteReview') }}">
    @method('DELETE')
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Content</th>
                <th scope="col">Rating</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Film id</th>
                <th scope="col">User id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)

            <tr>
                <th scope="row"> <input type="checkbox"
                        name="<?php echo $review["id"] ;?>"
                        value="<?php echo $review["id"] ;?>">
                    <?php echo $review["id"] ;?><br>
                </th>
                <td>{{$review["content"]}}</td>
                <td>{{$review["rating"]}}</td>
                <td>{{$review["created_at"]}}</td>
                <td>{{$review["updated_at"]}}</td>
                <td>{{$review["film_id"]}}</td>
                <td>{{$review["user_id"]}}</td>
            </tr>
            @endforeach
            <input type="submit" value="Submit">
</form>
</tbody>
</table>
