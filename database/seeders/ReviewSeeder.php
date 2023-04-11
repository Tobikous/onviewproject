<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;
use App\Models\User;
use App\Models\Tag;
use App\Models\Onsen;
use App\Models\GeocodeCalculator;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->random(5);
        $tags = Tag::all()->random(5);
        $onsens = Onsen::all()->random(5);

        $imagePaths = [
            'images/onsenimage01.jpg',
            'images/onsenimage02.jpg',
            'images/onsenimage03.jpg',
            'images/onsenimage04.jpg',
            'images/onsenimage05.jpg',
            'images/onsenimage06.jpg',
            'images/onsenimage07.jpg',
            'images/onsenimage08.jpg',
            'images/onsenimage09.jpg',
            'images/onsenimage10.jpg',
        ];

        foreach ($users as $user) {
            foreach ($tags as $tag) {
                $onsen = $onsens->random();
                $geocodedData = GeocodeCalculator::geocodeAddress($onsen->name);
                if ($geocodedData === null) {
                    $geocodedData = [
                        'latitude' => 35.681236,
                        'longitude' => 139.767125,
                        'formatted_address' => '〒100-0005 Tokyo, Chiyoda City, Marunouchi, 1 Chome-9-1 東京駅',
                    ];
                }

                $randomImagePath = $imagePaths[array_rand($imagePaths)];
                Review::factory()->create([
                    'user_id' => $user->id,
                    'tag_id' => $tag->id,
                    'onsenName' => $onsen->name,
                    'formatted_address' => $geocodedData['formatted_address'],
                    'latitude' => $geocodedData['latitude'],
                    'longitude' => $geocodedData['longitude'],
                    'image' => $randomImagePath,
                ]);
            }
        }
    }
}
