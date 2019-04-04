<div><h1>Admin</h1></div>

<h2>Reviews</h2>
    <form method="POST" action="{{ action('AdminController@deleteReview') }}">
            @method('DELETE')
            @csrf
        @foreach ($reviews as $review)
        
            <input type="checkbox" name="<?php echo $review["id"] ;?>" value="<?php echo $review["id"] ;?>"> <?php echo $review["id"] ;?><br>
            <p>{{$review["id"]}}</p>
            <p>{{$review["content"]}}</p>
            <p>{{$review["rating"]}}</p>
            <p>{{$review["created_at"]}}</p>
            <p>{{$review["updated_at"]}}</p>
            <p>{{$review["film_id"]}}</p>
            <p>{{$review["user_id"]}}</p>
        @endforeach
        <input type="submit" value="Submit">
    </form>

<h2>Users</h2>
    <form method="POST" action="{{ action('AdminController@deleteUser') }}">
        @method('DELETE')
        @csrf
    @foreach ($users as $user)
        <input type="checkbox" name="<?php echo $user["id"] ;?>" value="<?php echo $user["id"] ;?>"> <?php echo $user["id"] ;?><br>
        <p>{{$user["id"]}}</p>
        <p>{{$user["name"]}}</p>
        <p>{{$user["email"]}}</p>
        <p>{{$user["created_at"]}}</p>
        <p>{{$user["updated_at"]}}</p>
    @endforeach
    <input type="submit" value="Submit">
    </form>
 