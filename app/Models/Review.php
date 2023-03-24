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
}
