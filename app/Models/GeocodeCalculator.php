<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class GeocodeCalculator
{
    public static function geocodeAddress($onsenName)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$onsenName}&key={$apiKey}";

        $response = Http::get($url);

        $pdata = $response->json();

        if ($pdata['status'] === 'OK') {
            $location = $pdata['results'][0]['geometry']['location'];
            $formattedAddress = $pdata['results'][0]['formatted_address'];

            return [
            'latitude' => $location['lat'],
            'longitude' => $location['lng'],
            'formatted_address' => $formattedAddress,
            ];
        } else {
            return [
            'latitude' => null,
            'longitude' => null,
            'formatted_address' => null,
            ];
        }
    }
}
