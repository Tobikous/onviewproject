<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class GeocodeCalculator
{
    public static function geocodeAddress($onsenName)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $language = 'ja';
        $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$onsenName}&key={$apiKey}&language={$language}";

        $geocodeResponse = Http::retry(3, 100)->get($geocodeUrl);

        $geocodeData = $geocodeResponse->json();

        if ($geocodeData['status'] === 'OK') {
            $location = $geocodeData['results'][0]['geometry']['location'];
            $formattedAddress = $geocodeData['results'][0]['formatted_address'];
            $placeId = $geocodeData['results'][0]['place_id'];

            $placeDetailsUrl = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=formatted_phone_number,website,opening_hours&key={$apiKey}&language={$language}";
            $placeDetailsResponse = Http::retry(3, 100)->get($placeDetailsUrl);
            $placeDetailsData = $placeDetailsResponse->json();
            $formattedPhoneNumber = $placeDetailsData['result']['formatted_phone_number'] ?? null;
            $website = $placeDetailsData['result']['website'] ?? null;
            $openingHours = $placeDetailsData['result']['opening_hours'] ?? null;


            if ($formattedPhoneNumber !== null) {
                $formattedPhoneNumber = preg_replace('/^\+81/', '0', $formattedPhoneNumber);
            }

            // 最寄り駅のデータを取得
            $latitude = $location['lat'];
            $longitude = $location['lng'];
            $radius = 5000; // 5skm範囲で検索
            $type = 'train_station'; // 電車の駅を検索
            $nearbyStationsUrl = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$latitude},{$longitude}&radius={$radius}&type={$type}&key={$apiKey}&language={$language}";

            $nearbyStationsResponse = Http::retry(3, 100)->get($nearbyStationsUrl);
            $nearbyStationsData = $nearbyStationsResponse->json();

            $nearestStation = $nearbyStationsData['results'][0] ?? null;

            $nearestStationName = null;
            if ($nearestStation !== null) {
                $nearestStationName = $nearestStation['name'];
            }

            $holidayText = '定休日情報なし';
            $closedDays = [];
            if ($openingHours !== null) {
                $weekdayText = $openingHours['weekday_text'];

                $daysOfWeek = ['月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日','日曜日'];

                // 定休日が見つかったらclosedDays配列に追加
                foreach ($weekdayText as $day => $text) {
                    if (strpos($text, '定休日') !== false) {
                        $closedDays[] = $daysOfWeek[$day];
                    }
                }

                if (!empty($closedDays)) {
                    $holidayText = implode(', ', $closedDays);
                }
            }

            return [
                'latitude' => $location['lat'],
                'longitude' => $location['lng'],
                'formatted_address' => $formattedAddress,
                'formatted_phone_number' => $formattedPhoneNumber,
                'website' => $website,
                'nearest_station' => $nearestStationName,
                'holiday' => $holidayText,
            ];
        } else {
            return [
                'latitude' => null,
                'longitude' => null,
                'formatted_address' => null,
                'formatted_phone_number' => null,
                'website' => null,
                'nearest_station' => null,
                'holiday' => null,
            ];
        }
    }
}
