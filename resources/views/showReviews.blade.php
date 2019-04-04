<hr>
@foreach ($reviews as $review)
<h1>{{$review->content}}</h1>
<h1>{{$review->rating}}</h1>
<h1>{{$review->user_id}}</h1>
<hr>
@auth

@if(Auth::user()->id === $review->user_id)
<form class="d-inline" method="POST" action="/reviews/{{$review->id}}">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">Delete</button>
</form>
<button type="submit" class="btn btn-primary">Edit</button>
<hr>
@endif
@endauth

@endforeach
