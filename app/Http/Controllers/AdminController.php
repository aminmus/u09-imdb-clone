<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Watchlist;
use App\Review;
use App\User;
use App\Filmwatchlist;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reviews = Review::all()->toArray();
        $watchlists = Watchlist::all();
        
        return view('admin')->with(compact('users', 'reviews', 'watchlists'));
    }

    public function deleteReview($id)
    {
        // $input = Input::all();
        // $reviews = array_slice($input, 2);
        // Review::whereIn('id', $reviews)->delete();
        // return redirect('/admin')->with('success', 'Review Deleted!');
        $review = Review::find($id);
        $review->delete();
        return redirect('/admin')->with('success', 'Review Deleted!');

    }

    public function deleteUser(Request $request, $id)
    {
        // $input = Input::all();
        // $users = array_slice($input, 2);
        // User::whereIn('id', $users)->delete();
        // return redirect('/admin')->with('success', 'User Deleted!');

        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('success', 'User Deleted!');

    }

    public function deleteWatchlist(Request $request)
    {
        $input = Input::all();
        $watchlists = array_slice($input, 2);
        
        // Remove the relation in pivot table (required for next step)
        Filmwatchlist::whereIn('watchlist_id', $watchlists)->delete();

        Watchlist::whereIn('id', $watchlists)->delete();
        return redirect('/admin')->with('success', 'Watchlist Deleted!');
    }

    public function showReviews()
    {
        $reviews = Review::sortable()->paginate(1);
        return view('admin.reviews')->with('reviews', $reviews);
    }

    public function showUsers()
    {
        $users = User::sortable()->paginate(3);
        return view('admin.users')->with('users', $users);
    }

    public function showWatchlists()
    {
        $watchlists = Watchlist::sortable()->paginate(3);
        return view('admin.watchlists')->with('watchlists', $watchlists);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function updateReview(Request $request, $id)
    {
        $review = Review::find($id);

        $review->id = Input::get('id');
        $review->content = Input::get('content');
        $review->rating = $request->rating;
        $review->created_at = $request->created_at;
        $review->updated_at = $request->updated_at;
        $review->film_id = $request->film_id;
        $review->user_id = $request->user_id;
        $review->save();
        return back()->with('success', 'Review Updated');
        
    }

    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);

        $user->id = $request->id;
        $user->is_admin = $request->is_admin;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->created_at = $request->created_at;
        $user->updated_at = $request->updated_at;
        $user->email_verified_at = $request->email_verified_at;

        $user->save();
        return back()->with('success', 'User Updated');
    }
}
