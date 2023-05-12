<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $onsenId = $request->input('onsen_id');

        $isFavorite = Auth::user()->favorites()->where('onsen_id', $onsenId)->exists();

        if (!$isFavorite) {
            Auth::user()->favorites()->attach($onsenId);

            return back()->with('success', 'お気に入りに追加しました');
        }

        return back()->with('success', '既にお気に入りに入っています');
    }

    public function removeFavorite(Request $request)
    {
        $onsenId = $request->input('onsen_id');

        Auth::user()->favorites()->detach($onsenId);

        return back()->with('success', 'お気に入りから削除しました');
    }

    public function favoritesOnsen()
    {
        $favorites = Auth::user()->favorites()->paginate(10);

        $onsenNames = $favorites->pluck('name');

        $reviews = Review::whereIn('onsenName', $onsenNames)->get();

        return view('mypage', compact('favorites', 'reviews'));
    }
}
