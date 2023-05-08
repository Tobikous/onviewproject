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

        $onsens = Onsen::latestOrder()->paginate(3);

        $randomReviews = $onsens->map(function ($onsen) {
            return $onsen->reviews->random();
        });

        $reviews = Review::latestOrder()->paginate(3);

        $allTags = Tag::get();

        return view('home', compact('loggedInUser', 'randomReviews', 'onsens', 'reviews', 'allTags'));
    }

    public function teamOfService()
    {
        $loggedInUser = \Auth::user();

        return view('team-of-service', compact('loggedInUser'));
    }

    public function privacyPolicy()
    {
        $loggedInUser = \Auth::user();

        return view('privacy-policy', compact('loggedInUser'));
    }
}
