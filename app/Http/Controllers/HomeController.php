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
    public function index()
    {
        $loggedInUser = \Auth::user();

        $reviews = Review::latestOrder()->paginate(3);

        $allTags = Tag::get();

        return view('home', compact('loggedInUser', 'reviews', 'allTags'));
    }
}
