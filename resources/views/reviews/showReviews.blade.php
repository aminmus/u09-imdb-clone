<div class="mx-5">
  @foreach ($reviews as $review)
  <div class="row-md-8">
  
  <div class="col float-left">
    <p>{{$review->created_at}}</p>
    <h4>RATING: {{$review->rating}}</h4>
    <p>{{$review->user()->first()->name}}</p>
  </div>
  <div class="">
    <h2>{{$review->content}}</h2>
  </div>
    @auth
    @if(Auth::user()->id === $review->user_id)

  <div class="col-md-2">
      <form class="text-right" method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
      <button type="submit" class="btn btn-primary"
            data-toggle="modal" data-target="#editModal" value={{$review->id}}
            onClick="handleClick(this.value)">Edit</button>
      </form>
    </div>
    @endif
    @endauth

  </div>

  <hr class="my-3">

  @endforeach
</div>
@include('reviews.editModal')