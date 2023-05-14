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
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SearchReviewRequest;

class SearchController extends Controller
{
    public function reviewSearch(SearchRequest $request)
    {
        $keyword = $request->input('keyword');

        $reviews = Review::searchByName('onsenName', $keyword)->paginate(10);

        return view('search-result', compact('reviews', 'keyword'));
    }

    public function onsenSearch(SearchRequest $request)
    {
        $onsenkeyword = $request->input('keyword');

        $onsens = Onsen::searchByName('name', $onsenkeyword)->paginate(10);

        $reviews = Review::withRelations()->whereIn('onsenName', $onsens->pluck('name'))->get();

        return view('search-result', compact('onsens', 'onsenkeyword', 'reviews'));
    }

    public function tagSearch($id)
    {
        $tag = Tag::findOrFail($id);

        $tagName = $tag->name;

        $reviews = $tag->searchReviews()->paginate(10);

        return view('search-result', compact('tagName', 'reviews'));
    }
}
