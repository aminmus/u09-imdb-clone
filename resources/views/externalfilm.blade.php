<form method="POST" action="{{ route('test.testing') }}">
     
    <input type="text" name="search">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <button type="submit">Search Movie</button>
</form>


@if(isset($body->results))
    @foreach ($body->results as $result)

    <h1>{{$result->title}} </h1>
    <p>  {{$result->id}}<p>
    <img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>">
    <form method="POST" action="{{ action('WatchlistController@store') }}">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input name="movie_id" type="hidden" value="<?php echo $result->id;?>"/>
    <input name="title" type="hidden" value="<?php echo $result->title;?>"/>
    <input name="poster_path" type="hidden" value="<?php echo $result->poster_path;?>"/>
    <button type="submit">Save Movie</button>
    </form>
    @endforeach
@else
    <h1>Didnt work</h1>
@endif
