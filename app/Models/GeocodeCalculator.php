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
            // 住所、位置情報の取得
            $location = $geocodeData['results'][0]['geometry']['location'];
            $latitude = $location['lat'];
            $longitude = $location['lng'];
            $formattedAddress = $geocodeData['results'][0]['formatted_address'];


            // PlacedIDを取得してGoogle Places APIを使用
            $placeId = $geocodeData['results'][0]['place_id'];
            $placeDetailsUrl = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=formatted_phone_number,website,opening_hours&key={$apiKey}&language={$language}";
            $placeDetailsResponse = Http::retry(3, 100)->get($placeDetailsUrl);
            $placeDetailsData = $placeDetailsResponse->json();


            // WebサイトのURL取得
            $website = $placeDetailsData['result']['website'] ?? null;


            // 電話番号の取得
            $formattedPhoneNumber = $placeDetailsData['result']['formatted_phone_number'] ?? null;
            if ($formattedPhoneNumber !== null) {
                $formattedPhoneNumber = preg_replace('/^\+81/', '0', $formattedPhoneNumber);
            }


            // 最寄り駅のデータを取得
            $radius = 2000; // 2km範囲で検索
            $type = 'train_station'; // 電車の駅を検索
            $nearbyStationsUrl = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$latitude},{$longitude}&radius={$radius}&type={$type}&key={$apiKey}&language={$language}";

            $nearbyStationsResponse = Http::retry(3, 100)->get($nearbyStationsUrl);
            $nearbyStationsData = $nearbyStationsResponse->json();
            $nearestStation = $nearbyStationsData['results'][0] ?? null;

            $nearestStationName = null;
            if ($nearestStation !== null) {
                $nearestStationName = $nearestStation['name'];
            }


            // 定休日情報の取得
            $openingHours = $placeDetailsData['result']['opening_hours'] ?? null;
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
        }
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
