<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\User;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\OnsenUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $loggedInUser = \Auth::user();
        $allTags = Tag::get();

        $onsenName = $request->input('onsenName');
        $area = $request->input('area');

        return view('create', compact('loggedInUser', 'allTags', 'onsenName', 'area'));
    }




    public function store(ReviewStoreRequest $request)
    {
        $review = Review::createFromRequest($request);

        Onsen::updateOnsenEvaluation($review->onsenName);

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

        Onsen::updateOnsenEvaluation($review->onsenName);

        return redirect()->route('review', [ 'id' =>$review['id'] ])->with('success', 'レビューを更新しました。');
    }



    public function delete(Request $request, $id)
    {
        $inputs = $request->all();

        Review::where('id', $id)->delete();

        return redirect()->route('home')->with('success', 'レビュー投稿を削除しました。');
    }


    public function editOnsen($id)
    {
        $loggedInUser = \Auth::user();

        $onsen = Onsen::find($id);

        if (!$loggedInUser) {
            return redirect()->back()->with('error', 'この温泉を編集する権限はありません。');
        }

        return view('edit-onsen', compact('loggedInUser', 'onsen'));
    }


    public function updateOnsen(OnsenUpdateRequest $request, $id)
    {
        $onsen = Onsen::updateOnsenRequest($request, $id);

        return redirect()->route('onsen_content', [ 'id' =>$onsen['id'] ])->with('success', '温泉の情報を更新しました。');
    }
}
