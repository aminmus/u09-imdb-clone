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

    public function showReview()
    {
        return view('reviews');
    }

    public function postReview(Request $request)
    {
        // Validate input, if input is invalid an error message will be sent to view
        $request->validate([
            'content' => ['required', 'max:191'],   // Max characters because of our default string length
            'rating' => ['required', 'numeric']
        ]);
        
        $userId = Auth::id();
        $review = new Review;
        $review->content = $request->content;
        $review->movie_id = $request->movie_id;
        $review->rating = $request->rating;
        $review->user_id = $userId;

        $review->save();

        return back()->with('success', 'Review Submitted!');
    }

    public function editReview($id)
    {
        $review = Review::find($id);

        view('editreview')->with(compact('review'));

        return back()->with('edit', $edit);
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        $review->delete();

        return back()->with('success', 'Review Deleted');
    }

    // Gets all reviews that were created by the signed in user
    public function getMyReviews()
    {
        $user = Auth::user();
        $reviews = $user->reviews()->get();
        return view('reviews.myReviews')->with('reviews', $reviews);
    }

    public function updateReview(Request $request, $id)
    {
        // Validate input, if input is invalid an error message will be sent to view
        $request->validate([
        'content' => ['required', 'max:191'],   // Max characters because of our default string length
        'rating' => ['required', 'numeric']
        ]);

        $review = Review::find($id);
        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->save();
        
        return back()->with('success', 'Review Updated!');
    }
}
