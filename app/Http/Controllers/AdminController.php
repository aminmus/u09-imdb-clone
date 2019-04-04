<?php

namespace App\Http\Controllers;

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
}
