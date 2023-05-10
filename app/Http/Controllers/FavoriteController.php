<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $loggedInUser = Auth::user();
        $onsenId = $request->input('onsen_id');


        $isFavorite = $loggedInUser->favorites()->where('onsen_id', $onsenId)->exists();

        if (!$isFavorite) {
            $loggedInUser->favorites()->attach($onsenId);

            return back()->with('success', 'お気に入りに追加しました');
        }

        return back()->with('success', '既にお気に入りに入っています');
    }



    public function removeFavorite(Request $request)
    {
        $onsenId = $request->input('onsen_id');
        $loggedInUser = Auth::user();


        $loggedInUser->favorites()->detach($onsenId);

        return back()->with('success', 'お気に入りから削除しました');
    }
}
