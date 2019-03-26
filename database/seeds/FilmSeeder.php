<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use App\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $movies = json_decode($client->request('GET', "discover/movie?sort_by=popularity.desc&api_key=45499dda27fbc45918728b51e4e82810")->getBody());
        $createdMovies = [];

        foreach ($movies->results as $movie) {
            $createdMovies[] = Film::create([
                'movie_id' =>  $movie->id,
                'title' =>  $movie->title,
                'poster_path' => $movie->poster_path
            ]);
        }
    }
}
