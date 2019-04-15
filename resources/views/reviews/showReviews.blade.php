@foreach ($reviews as $review)

<div class="row my-5" id="review-container-{{$review->id}}">
<div class="col-md-2">
    <h2 class="review-rating">RATING: {{$review->rating}}</h2>
    <h2 class="review-user_id">USER-NAME: {{$review->user_id}}</h2>
</div>
<div class="col-md-8">
    <h2 class="review-content">{{$review->content}}</h2>
</div>

    @auth

    @if(Auth::user()->id === $review->user_id)
<div class="col-md-2">
    <form class="d-inline" method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal" value={{$review->id}}
        onClick="handleClick(this.value)">Edit</button>
</div>
    <hr>

    @endif
    @endauth

</div>

@endforeach

@include('reviews.editModal')
