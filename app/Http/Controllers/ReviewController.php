<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Film;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showReview']]);
    }

    public function getReviews(Request $request)
    {

    }

    public function showReview()
    {   
        
        return view('reviews');
    }

    public function postReview(Request $request)
    {
        // $film = Film::where('movie_id', $request->movie_id)->get();

        $userId = Auth::id();
        $review = new Review;
        $review->content = $request->content;
        $review->film_id = $request->movie_id;
        $review->rating = $request->rating;
        $review->user_id = $userId;

        $review->save();
        return back();
    }

    public function editReview($id)
    {
        $review = Review::find($id);

        view('editreview')->with(compact('review'));

        return back()->with('edit', $edit);

        // need to be completed
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        $review->delete();

        return back()->with('success', 'Review Deleted');
        
        
    }
}
