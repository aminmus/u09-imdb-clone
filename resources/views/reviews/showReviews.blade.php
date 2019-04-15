<hr>
@foreach ($reviews as $review)
<div id="review-container-{{$review->id}}">
    <h2 class="review-content">{{$review->content}}</h2>
    <h2 class="review-rating">Rating: {{$review->rating}}/5</h2>
    <h2 class="review-user_name">Written by: {{$review->user()->first()->name}}</h2>
    <hr>
    @auth

    @if(Auth::user()->id === $review->user_id)
    <form class="d-inline" method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal" value={{$review->id}}
        onClick="handleClick(this.value)">Edit</button>
    <hr>
    @endif
    @endauth
</div>
@endforeach

@include('reviews.editModal')
