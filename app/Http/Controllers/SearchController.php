<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{

    public function gettest(Request $request) 
    {
        /* $someInput = $request->search;
         
        $client = new Client(['base_uri' => 'http://www.omdbapi.com']);
        $response = $client->request('GET', "?apikey=9f8c9418&t=${someInput}");
        
        $json = $response->getBody();
        $body = json_decode($json);
        return view('searchresults')->with('body', $body); */

        $someInput = $request->search;
        
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $response = $client->request('GET', "search/movie?api_key=45499dda27fbc45918728b51e4e82810&query=${someInput}");
        
            
        $json = $response->getBody();
        $body = json_decode($json);
        return view('externalfilm')->with('body', $body);
    } 
}