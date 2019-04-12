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

    public function deleteReview(Request $request)
    {
        $input = Input::all();
        $reviews = array_slice($input, 2);
        Review::whereIn('id', $reviews)->delete();
        return redirect('/admin')->with('success', 'Review Deleted!');
    }

    public function deleteUser(Request $request)
    {
        $input = Input::all();
        $users = array_slice($input, 2);
        User::whereIn('id', $users)->delete();
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
}
