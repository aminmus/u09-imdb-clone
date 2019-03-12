<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ExternalFilm extends Controller
{
    //
    public function saveApiData()
    {
        // TODO - Refaktorisera till en service
        $client = new Client(['base_uri' => 'http://www.omdbapi.com']);
        
        $response = $client->request('GET', '?apikey=9f8c9418&t=star+wars');
        
        $body = $response->getBody();

        echo $body;
        
    }
}
