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
    protected $fillable = ['name','area','formatted_address','latitude','longitude','phone_number','URL','nearest_station','opening_hours'];


    public function reviewsWithRelations()
    {
        $reviews = $this->reviews();

        foreach ($reviews as $review) {
            $tag = $review->tag;
            $user = $review->user;
        }

        return $reviews;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'onsenName', 'name');
    }

    public function scopeLatestOrder($query)
    {
        return $query->OrderBy('updated_at', 'DESC');
    }
}
