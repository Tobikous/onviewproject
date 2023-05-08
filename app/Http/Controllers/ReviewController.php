<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\User;
use App\Http\Requests\ReviewStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create()
    {
        $loggedInUser = \Auth::user();

        $allTags = Tag::get();

        $reviews = Review::latestOrder()->get();

        return view('create', compact('loggedInUser', 'allTags', 'reviews'));
    }



    public function store(ReviewStoreRequest $request)
    {
        $review = Review::createFromRequest($request);

        return redirect()->route('home')->with('success', 'レビューを投稿しました。');
    }



    public function edit($id)
    {
        $loggedInUser = \Auth::user();

        $review = Review::with('tag')->find($id);

        if ($loggedInUser->id !== $review->user_id) {
            return redirect()->back()->with('error', 'このレビューを編集する権限はありません。');
        }

        $allTags = Tag::get();

        return view('edit', compact('loggedInUser', 'review', 'allTags'));
    }




    public function update(ReviewStoreRequest $request, $id)
    {
        $review = Review::updateFromRequest($request, $id);

        return redirect()->route('home')->with('success', 'レビューを更新しました。');
    }



    public function delete(Request $request, $id)
    {
        $inputs = $request->all();

        Review::where('id', $id)->delete();

        return redirect()->route('home')->with('success', 'レビュー投稿を削除しました。');
    }
}
