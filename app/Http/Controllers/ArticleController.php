<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\User;
use App\Http\Requests\ReviewStoreRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SearchReviewRequest;

class ArticleController extends Controller
{
    public function article()
    {
        $loggedInUser = \Auth::user();

        $reviews = Review::latestOrder()->paginate(7);

        return view('article', compact('loggedInUser', 'reviews'));
    }



    public function reviewContent($id)
    {
        $loggedInUser = \Auth::user();

        $review = Review::with(['user', 'tag', 'onsen'])->find($id);

        return view('show', compact('loggedInUser', 'review'));
    }

    public function search(SearchReviewRequest $request)
    {
        $keyword = $request->input('keyword');
        $reviews = Review::searchByOnsenName($keyword)->paginate(9);

        return view('search-result', compact('reviews', 'keyword'));
    }
}
