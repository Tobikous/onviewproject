<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['content','star','time','user_id','onsenName','tag_id','image','formatted_address','latitude','longitude'];

    public function scopeLatestOrder($query)
    {
        return $query->OrderBy('updated_at', 'DESC');
    }

    public function scopeMatchId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeMatchUser($id)
    {
        return User::where('id', $users);
    }

    public function isWrittenByUser(User $user): bool
    {
        return $this->user_id == $user->id;
    }

    public function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";

        $response = Http::get($url);
        $pdata = $response->json();

        if ($pdata['status'] === 'OK') {
            $location = $pdata['results'][0]['geometry']['location'];
            $formatted_address = $pdata['results'][0]['formatted_address'];

            return [
                'latitude' => $location['lat'],
                'longitude' => $location['lng'],
                'formatted_address' => $formatted_address,
            ];
        }
    }

    public static function scopeMatchReview($id)
    {
        $review = self::find($id);
        $review->tags = Tag::find($review->tag_id);
        $review->onsen = Onsen::where('name', $review->onsenName)->first();
        $review->userName = User::find($review->user_id);

        return $review;
    }
}
