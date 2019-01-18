<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'content' => 'Want to build a snowman',
            'rating' => 4.5,
        ]);

        Review::create([
            'content' => 'Very good movie, I recommend to watch this now!',
            'rating' => 5,
        ]);
    }
}
