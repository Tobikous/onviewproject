<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ReviewStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\GeocodeCalculator;

class Onsen extends Model
{
    protected $table = 'onsenAreaData';
    protected $fillable = ['name','area','evaluation','formatted_address','latitude','longitude','phone_number','URL','nearest_station','opening_hours'];


    public function reviewsWithRelations()
    {
        $reviews = $this->reviews();

        foreach ($reviews as $review) {
            $tag = $review->tag;
            $user = $review->user;
        }

        return $reviews;
    }



    public static function searchByOnsenName($keyword)
    {
        return self::where('name', 'LIKE', "%{$keyword}%");
    }



    public function reviews()
    {
        return $this->hasMany(Review::class, 'onsenName', 'name');
    }



    public function scopeLatestOrder($query)
    {
        return $query->OrderBy('updated_at', 'DESC');
    }



    public static function updateOnsenEvaluation($onsenName)
    {
        $reviews = Review::where('onsenName', $onsenName)->get();
        $totalStars = 0;
        $reviewCount = count($reviews);

        foreach ($reviews as $review) {
            $totalStars += substr_count($review->star, '★');
        }

        $averageRating = round($totalStars / $reviewCount, 2);

        $onsen = Onsen::where('name', $onsenName)->first();
        if ($onsen) {
            $onsen->update(['evaluation' => $averageRating]);
        }
    }
}
