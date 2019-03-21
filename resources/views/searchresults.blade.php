
@foreach ($body->results as $result)

        <h1>{{$result->title}} </h1>
          <p>  {{$result->id}}<p>
        <img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>">
        <form method="POST" action="{{ action('WatchlistController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="imdbID" type="hidden" value="<?php echo $result->id;?>"/>
        <button type="submit">Save Movie</button>
        </form>
@endforeach



    