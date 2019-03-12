<?php
$json = json_decode(file_get_contents('http://www.omdbapi.com/?apikey=9f8c9418&t=star+wars'), true);?>
<p><? var_dump($json)?></p>
