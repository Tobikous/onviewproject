<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\GeocodeCalculator;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = ['content','star','time','user_id','onsenName','tag_id','image','formatted_address','latitude','longitude'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function onsen()
    {
        return $this->belongsTo(Onsen::class, 'onsenName', 'name');
    }

    public function scopeLatestOrder($query)
    {
        return $query->OrderBy('updated_at', 'DESC');
    }



    public function scopeMatchId($query, $id)
    {
        return $query->where('id', $id);
    }



    public static function scopeMatchReview($id)
    {
        $review = self::find($id);

        $review->tags = Tag::find($review->tag_id);

        $review->onsen = Onsen::where('name', $review->onsenName)->first();

        $review->userName = User::find($review->user_id);

        return $review;
    }



    public function isWrittenByUser(User $user): bool
    {
        return $this->user_id == $user->id;
    }



    public function geocodeAddress($onsenName)
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



    public static function createFromRequest(UserRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = Storage::disk('s3')->putFile('/', $image, 'public');
                $data['image'] = Storage::disk('s3')->url($path);
            } else {
                $data['image'] = 'null';
            }

            $onsen = Onsen::firstOrCreate(
                ['name' => $data['onsenName']],
                ['area' => $data['area']]
            );

            $tag = Tag::firstOrCreate(
                ['name' => $data['tag']],
                ['user_id' => $data['user_id']]
            );

            $geocodedData = GeocodeCalculator::geocodeAddress($data['onsenName']);

            $review = Review::create([
                'content' => $data['content'],
                'user_id' => $data['user_id'],
                'star' => $data['star'],
                'time' => $data['time'],
                'image' => $data['image'],
                'tag_id' => $tag->id,
                'onsenName' => $data['onsenName'],
                'formatted_address' => $geocodedData['formatted_address'],
                'latitude' => $geocodedData['latitude'],
                'longitude' => $geocodedData['longitude'],
            ]);

            return $review;
        });
    }




    public static function updateFromRequest(UserRequest $request, $id)
    {
        $data = $request->all();

        $tag = Tag::firstOrCreate(
            ['name' => $data['tag']],
            ['user_id' => $data['user_id']]
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            $data['image'] = Storage::disk('s3')->url($path);
        }

        $review = Review::findOrFail($id);

        $review->update([
            'content' => $data['content'],
            'star' => $data['star'],
            'time' => $data['time'],
            'image' => $data['image'],
            'tag_id' => $tag->id,
        ]);

        return $review;
    }
}
