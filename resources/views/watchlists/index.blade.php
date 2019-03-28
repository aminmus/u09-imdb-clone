
    <h1>Posts</h1>
    @if(count($watchlists) > 0)
        @foreach($watchlists as $watchlist)
            <div>
            <h3>{{$watchlist->list_name}}</h3>
            <small>user id: {{$watchlist->user_id}}</small>
            </div>
            @endforeach
    @else
        <p>No watchlists found</p>
    @endif
