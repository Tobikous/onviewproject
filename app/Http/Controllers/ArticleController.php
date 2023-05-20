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
        $reviews = Review::withRelations()->latestOrder()->paginate(10);

        return view('review-list', compact('reviews'));
    }

    public function onsenLists()
    {
        $onsens = Onsen::latestOrder()->paginate(10);

        $reviews = Review::withRelations()->whereIn('onsenName', $onsens->pluck('name'))->get();

        return view('onsen-list', compact('onsens', 'reviews'));
    }

    public function filterByArea(Request $request)
    {
        $selectedArea = $request->input('area');

        $onsens = Onsen::where('area', $selectedArea)->latestOrder()->paginate(10);

        $reviews = Review::withRelations()->whereIn('onsenName', $onsens->pluck('name'))->get();

        return view('onsen-list', compact('onsens', 'reviews', 'selectedArea'));
    }

    public function myReviews()
    {
        $loggedInUser = \Auth::user();

        $myReviews =$loggedInUser->reviews()
                    ->latestOrder()
                    ->paginate(10);

        return view('mypage', compact('myReviews'));
    }

    public function reviewContent($id)
    {
        $review = Review::with(['user', 'tag', 'onsen'])->find($id);

        return view('review-content', compact('review'));
    }


    public function onsenContent($id)
    {
        $onsen = Onsen::find($id);

        $reviews = $onsen->reviewsWithRelations()->paginate(10);

        return view('onsen-content', compact('onsen', 'reviews'));
    }


    public function onsenMap()
    {
        $onsens = Onsen::all();
        return view('onsen-map', compact('onsens'));
    }
}
