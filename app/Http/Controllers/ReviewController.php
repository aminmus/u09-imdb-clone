<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReviewController extends Controller
{

    public function gettest(Request $request) 
    {
        $someInput = $request->search;

        $client = new Client(['base_uri' => 'http://www.omdbapi.com']);
        
        $response = $client->request('GET', "?apikey=9f8c9418&t=${someInput}");
        
        $json = $response->getBody();
        $body = json_decode($json);
        return view('searchresults')->with('body', $body);

    }
}
