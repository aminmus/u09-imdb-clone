<div class="reviews">
    @foreach ($reviews as $review)

    <div class="testing" id="review-container-{{$review->id}}">

    <div class="">
        <p>{{$review->created_at}}</p>
        <h4 class="review-rating">RATING: {{$review->rating}}</h2>
        <h4 class="review-user_id">USER-NAME: {{$review->user_id}}</h2>
    </div>
    <div class="">
        <h2 class="review-content">{{$review->content}}</h2>
        <h2 class="review-rating">Rating: {{$review->rating}}/5</h2>
        <h2 class="review-user_name">Written by: {{$review->user()->first()->name}}</h2>
        <hr>
        @auth

        @if(Auth::user()->id === $review->user_id)
    <div class="">
        <form class="d-inline" method="POST" action="/reviews/{{$review->id}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal" value={{$review->id}}
            onClick="handleClick(this.value)">Edit</button>
    </div>

        @endif
        @endauth

    </div>
    @endforeach
</div>
@include('reviews.editModal')
