<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\OnsenUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\GeocodeCalculator;
use App\Traits\OrderByLatest;

class Onsen extends Model
{
    use OrderByLatest;
    protected $table = 'onsenAreaData';
    protected $fillable = ['name','area','evaluation','formatted_address','latitude','longitude','phone_number','URL','nearest_station','regular_holiday'];


    public function reviews()
    {
        return $this->hasMany(Review::class, 'onsenName', 'name');
    }



    public function reviewsWithRelations()
    {
        $reviews = $this->reviews();

        foreach ($reviews as $review) {
            $tag = $review->tag;
            $user = $review->user;
        }

        return $reviews;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorite', 'onsen_id', 'user_id');
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }




    public static function searchByOnsenName($keyword)
    {
        return self::where('name', 'LIKE', "%{$keyword}%");
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

    public static function updateOnsenRequest(OnsenUpdateRequest $request, $id)
    {
        $data = $request->all();

        $onsen = Onsen::findOrFail($id);

        $onsen->update([
            'area' => $data['area'],
            'formatted_address' => $data['formatted_address'],
            'nearest_station' => $data['nearest_station'],
            'regular_holiday' => $data['regular_holiday'],
        ]);

        return $onsen;
    }

    public static function updateOrGetFromData(array $data, array $geocodedData): Onsen
    {
        $onsen = self::firstOrNew(['name' => $data['onsenName']]);

        if (!$onsen->exists || ($onsen->exists && empty($onsen->formatted_address))) {
            $onsen->area = $data['area'];
            $onsen->latitude = $geocodedData['latitude'];
            $onsen->longitude = $geocodedData['longitude'];
            $onsen->formatted_address = $geocodedData['formatted_address'];
            $onsen->phone_number = $geocodedData['formatted_phone_number'];
            $onsen->URL = $geocodedData['website'];
            $onsen->nearest_station = $geocodedData['nearest_station'];
            $onsen->regular_holiday = $geocodedData['holiday'];

            $onsen->save();
        }

        return $onsen;
    }
}
