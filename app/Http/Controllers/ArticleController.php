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

    public function create()
    {
        $loggedInUser = \Auth::user();
        $allTags = Tag::get();
        $reviews = Review::latestOrder()->get();

        return view('create', compact('loggedInUser', 'allTags', 'reviews'));
    }





    public function store(UserRequest $request)
    {
        $data = $request->all();

        $request->validate([
            'onsenName' => 'required',
        ]);

        $newReview = new Review();
        $geocodedData = $newReview -> geocodeAddress($request->onsenName);

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            $imagepath = Storage::disk('s3')->url($path);
        } else {
            $imagepath = 'null';
        }

        $existOnsen = Onsen::where('name', $data['onsenName'])->first();
        if (empty($existOnsen['id'])) {
            $onsen = Onsen::create(['name'=>$data['onsenName'],'area'=>$data['area']]);
        } else {
            $onsenId = $existOnsen['id'];
        }

        $existTag = Tag::where('name', $data['tag'])->first();
        if (empty($existTag['id'])) {
            $tagId = Tag::insertGetId(['name' => $data['tag'],'user_id' => $data['user_id']]);
        } else {
            $tagId = $existTag['id'];
        }

        $review = Review::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'star' => $data['star'],
            'time' => $data['time'],
            'image' => $imagepath,
            'tag_id' => $tagId,
            'onsenName' => $data['onsenName'],
            'formatted_address' => $geocodedData['formatted_address'],
            'latitude' => $geocodedData['latitude'],
            'longitude' => $geocodedData['longitude']
        ]);

        return redirect()->route('home')->with('success', 'レビューを投稿しました。');
    }





    public function show($id)
    {
        $loggedInUser = \Auth::user();
        $review = Review::scopeMatchReview($id);

        return view('show', compact('loggedInUser', 'review'));
    }





    public function edit($id)
    {
        $loggedInUser = \Auth::user();
        $review = Review::scopeMatchReview($id);

        if ($loggedInUser->id !== $review->user_id) {
            return redirect()->back()->with('error', 'このレビューを編集する権限はありません。');
        }

        $allTags = Tag::get();

        return view('edit', compact('loggedInUser', 'review', 'allTags', ));
    }





    public function update(UserRequest $request, $id)
    {
        $inputs = $request->all();
        $existTag = Tag::where('name', $inputs['tag'])->first();
        if (empty($existTag['id'])) {
            $tagId = Tag::insertGetId(['name'=>$inputs['tag'],'user_id'=>$inputs['user_id']]);
        } else {
            $tagId = $existTag['id'];
        }

        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            $imagepath = Storage::disk('s3')->url($path);
        }

        Review::where('id', $id)->update([
        'content'=> $inputs['content'],
        'star' => $inputs['star'],
        'time' => $inputs['time'],
        'image' => $imagepath,
        'tag_id' => $tagId ]);
        return redirect()->route('home')->with('success', 'レビューを更新しました。');
    }





    public function delete(Request $request, $id)
    {
        $inputs = $request->all();
        Review::where('id', $id)->delete();
        return redirect()->route('home')->with('success', 'レビュー投稿を削除しました。');
    }
}
