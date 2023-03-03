<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function article()
    {
        $user = \Auth::user();
        $reviews = Review::latestOrder()->paginate(5);
        return view('article', compact('user', 'reviews'));
    }

    public function create()
    {
        $user = \Auth::user();
        if ($user['id'] !== 1) {
            $allTags = Tag::get();
            $reviews = Review::latestOrder()->get();
            return view('create', compact('user', 'allTags', 'reviews'));
        } else {
            return redirect()->route('home')->with('success', 'ゲストは記事を投稿できません。');
        }
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

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
            'status' => 1
        ]);

        return redirect()->route('home')->with('success', 'レビューを投稿しました。');
    }

    public function show($id)
    {
        $user = \Auth::user();
        $showReview = Review::where('id', $id)
        ->first();
        $myShowReview = Review::where('id', $id)->where('user_id', $user['id'])
        ->first();
        // $myReview = $user()->reviews();
        $tagId = $showReview['tag_id'];
        $tags = Tag::where('id', $tagId)->first();
        $onsenName = $showReview['onsenName'];
        $onsen = Onsen::where('name', $onsenName)->first();
        return view('show', compact('user', 'showReview', 'myShowReview', 'tags', 'onsen'));
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $showReview = Review::where('id', $id)->where('user_id', $user['id'])
        ->first();
        $tagId = $showReview['tag_id'];
        $tags = Tag::where('id', $tagId)->first();
        $allTags = Tag::get();
        $onsenName = $showReview['onsenName'];
        $onsen = Onsen::where('name', $onsenName)->first();
        return view('edit', compact('user', 'showReview', 'tags', 'allTags', 'onsen'));
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
