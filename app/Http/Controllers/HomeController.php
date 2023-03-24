<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index()
    {
        $user = \Auth::user();
        $reviews = Review::latestOrder()->paginate(3);
        // if (Auth::check()) {
        //     $myReviews = Review::where('user_id', $user['id'])->latestOrder()->paginate(3);
        // } else {
        //     $myReviews = null;
        // }
        return view('home', compact('user', 'reviews'));
    }
}
