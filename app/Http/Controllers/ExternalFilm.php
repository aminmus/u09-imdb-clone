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
        
        $json = $response->getBody();
        $body = json_decode($json);
        return view('externalfilm')->with('body', $body);
    }
}


