<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $reviews = Review::latestOrder()->paginate(3);
        return view('homeGuest', compact('reviews'));
    }

    public function article()
    {
        $reviews = Review::latestOrder()->paginate(5);
        return view('articleGuest', compact('reviews'));
    }

    public function show($id)
    {
        $showReview = Review::where('id', $id)
        ->first();

        // $myReview = $user()->reviews();
        $tagId = $showReview['tag_id'];
        $tags = Tag::where('id', $tagId)->first();
        $onsenName = $showReview['onsenName'];
        $onsen = Onsen::where('name', $onsenName)->first();
        return view('showGuest', compact('showReview', 'tags', 'onsen'));
    }

    public function maps()
    {
        return view('maps');
    }
}
