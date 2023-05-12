<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $loggedInUser = \Auth::user();

        $onsens = Onsen::latestOrder()->paginate(3);

        $randomReviews = $onsens->map(function ($onsen) {
            return $onsen->reviews->isNotEmpty() ? $onsen->reviews->random() : null;
        });

        $reviews = Review::latestOrder()->paginate(3);
        $myReviews = \Auth::check() ? $loggedInUser->reviews()->latestOrder()->paginate(3) : collect();

        $allTags = Tag::get();

        return view('home', compact('randomReviews', 'onsens', 'reviews', 'allTags', 'myReviews'));
    }
}
