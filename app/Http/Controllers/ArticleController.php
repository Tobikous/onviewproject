<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\User;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SearchReviewRequest;

class ArticleController extends Controller
{
    public function reviewLists()
    {
        $loggedInUser = \Auth::user();

        $reviews = Review::withRelations()->latestOrder()->paginate(10);

        return view('review-list', compact('loggedInUser', 'reviews'));
    }

    public function onsenLists()
    {
        $loggedInUser = \Auth::user();

        $onsens = Onsen::latestOrder()->paginate(10);

        $reviews = Review::withRelations()->whereIn('onsenName', $onsens->pluck('name'))->get();

        return view('onsen-list', compact('loggedInUser', 'onsens', 'reviews'));
    }

    public function filterByArea(Request $request)
    {
        $loggedInUser = \Auth::user();

        $selectedArea = $request->input('area');

        $onsens = Onsen::where('area', $selectedArea)->latestOrder()->paginate(10);

        $reviews = Review::withRelations()->whereIn('onsenName', $onsens->pluck('name'))->get();

        return view('onsen-list', compact('loggedInUser', 'onsens', 'reviews', 'selectedArea'));
    }

    public function myReviews()
    {
        $loggedInUser = \Auth::user();

        $myReviews = Review::withRelations()
                    ->where('user_id', $loggedInUser->id)
                    ->latestOrder()
                    ->paginate(10);

        return view('mypage', compact('myReviews'));
    }

    public function reviewContent($id)
    {
        $loggedInUser = \Auth::user();

        $review = Review::with(['user', 'tag', 'onsen'])->find($id);

        return view('review-content', compact('loggedInUser', 'review'));
    }


    public function onsenContent($id)
    {
        $loggedInUser = \Auth::user();

        $onsen = Onsen::find($id);

        $reviews = $onsen->reviewsWithRelations()->paginate(10);

        return view('onsen-content', compact('loggedInUser', 'onsen', 'reviews'));
    }
}
