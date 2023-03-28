<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function article()
    {
        $loggedInUser = \Auth::user();

        $reviews = Review::latestOrder()->paginate(5);

        return view('article', compact('loggedInUser', 'reviews'));
    }



    public function show($id)
    {
        $loggedInUser = \Auth::user();

        $review = Review::scopeMatchReview($id);

        return view('show', compact('loggedInUser', 'review'));
    }
}
