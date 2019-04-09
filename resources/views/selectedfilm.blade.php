

@extends('welcome')


    
@section('content')


<h1>{{$body->title}} </h1>
<p>  {{$body->id}}<p>
<p>  {{$body->budget}}<p>
<p>  {{$body->overview}}<p>
<p>  {{$body->popularity}}<p>
    
    <?php $count = 0; ?>
@foreach ($credits->cast as $cast)
    <?php if($count == 5) break; ?>
    <p>{{$cast->character}}</p>
    <p>{{$cast->name}}</p>
    <a href="{{ url('selectedActor/' .$cast->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $cast->profile_path;?>" alt=""></a>
    <?php $count++; ?>
@endforeach

<img src="http://image.tmdb.org/t/p/w185/<?php echo $body->poster_path;?>">

@auth
    @if(isset($userWatchlist))
    <form method="POST" action="{{ action('WatchlistController@store') }}">
    <select name="watchlist_id">
        @foreach ($userWatchlist as $watchlist)
        <option value="<?php echo $watchlist->id ;?>"><?php echo $watchlist->name ;?></option>
        @endforeach
    </select>
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
        <input name="title" type="hidden" value="<?php echo $body->title;?>"/>
        <input name="poster_path" type="hidden" value="<?php echo $body->poster_path;?>"/>
    <button type="submit">Save Movie</button>
    <a href="/watchlist/create" class="btn btn-link">Create Watchlist</a>
    <a class="btn btn-link" href="/watchlist">Show Watchlists</a>
    
    </form> 
    @else
        <h1>No watchlists, why dont you create some!</h1>
        <button class="btn btn-link"><a href="/watchlist/create">Create Watchlist</a></button>
        <hr>
    @endif
@endauth

@guest
    <h1>Create an account to create watchlists</h1>
@endguest



{{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Watchlists
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div> --}}


<hr>
 @foreach ($reviews as $review)
     <h1>{{$review->content}}</h1>
     <h1>{{$review->rating}}</h1>
     <h1>{{$review->user_id}}</h1>
     <hr>
@auth
    
@if(Auth::user()->id === $review->user_id)
    <form class="d-inline"method="POST" action="/reviews/{{$review->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
    <hr>
@endif
 editbtn
@endauth

 {{-- @endforeach --}}
 
  user-crud-operations


<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/reviews/{{$review->id}}" >
                        @csrf
                        @method('PUT')
                {{-- <input name="movie_id" type="hidden" class="mb-2"value="{{$review->id}}"/> --}}
                <input type="text-area" class="form-control" id="formGroupExampleInput2" name="content" placeholder="review" class="mb-2" value="{{$review->content}}">
                        <select class="custom-select col-md-2 mt-1" id="inputGroupSelect04" name="rating" aria-label="Example select with button addon">
                        <option selected="{{$review->rating}}">Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @endforeach
 <!-- Här behövs det visas kommentarer för specifik film
 Ladda in reviews. -->
@auth
    @include('reviews') 
@endauth



@endsection
