


<form method="POST" action="{{ route('test.testing') }}">
     
    <input type="text" name="search">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <button type="submit">Search Movie</button>
</form>

@foreach ($body->results as $result)

        <h1>{{$result->title}} </h1>
          <p>  {{$result->id}}<p>
        <img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>">
        <form method="POST" action="{{ action('WatchlistController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="imdbID" type="hidden" value="<?php echo $result->id;?>"/>
        <input name="imdbID" type="hidden" value="<?php echo $result->title;?>"/>
        <input name="imdbID" type="hidden" value="<?php echo $result->poster_path;?>"/>
        <button type="submit">Save Movie</button>
        </form>
@endforeach
