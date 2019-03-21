<?php 



/* echo $body->Title;
echo $body->Year;
echo $body->Rated;
echo $body->Released;
echo $body->Runtime;
echo $body->Genre;
echo $body->imdbID; */
?>

<div>
<img src=" <?php echo $body->Poster?>">
<h1><?php echo $body->Title?></h1>
<p><?php echo $body->Year?></p>
<p><?php echo $body->Rated?></p>
<p><?php echo $body->Released?></p>
<p><?php echo $body->Runtime?></p>
<p><?php echo $body->Genre?></p>
<div>




<form method="POST" action="{{ action('WatchlistController@store') }}">
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
<input name="imdbID" type="hidden" value="{{$body->imdbID}}"/>
<button type="submit">Save Movie</button>
</form>

