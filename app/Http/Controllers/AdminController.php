<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Watchlist;
use App\Review;
use App\User;


class AdminController extends Controller
{
    public function index ()
    {
        $users = User::all();
        $reviews = Review::all()->toArray();
        
        
        return view('admin')->with(compact('users', 'reviews'));
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
}
