<div><h1>Admin</h1></div>

<h2>Reviews</h2>
@foreach ($reviews as $review)
    <p>{{$review["id"]}}</p>
    <p>{{$review["content"]}}</p>
    <p>{{$review["rating"]}}</p>
    <p>{{$review["created_at"]}}</p>
    <p>{{$review["updated_at"]}}</p>
    <p>{{$review["film_id"]}}</p>
    <p>{{$review["user_id"]}}</p>
@endforeach
<form action="">
    
</form>