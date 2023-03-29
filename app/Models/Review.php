<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

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



    public static function createFromRequest(UserRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            $data['image'] = Storage::disk('s3')->url($path);
        } else {
            $data['image'] = 'null';
        }

        // $onsen = Onsen::firstOrCreate(
        //     ['name' => $data['onsenName']],
        //     ['area' => $data['area']]
        // );

        // $tag = Tag::firstOrCreate(
        //     ['name' => $data['tag']],
        //     ['user_id' => $data['user_id']]
        // );

        // $review = new Review();

        // $geocodedData = $review->geocodeAddress($data['onsenName']);

        // $review->fill([
        //     'content' => $data['content'],
        //     'user_id' => $data['user_id'],
        //     'star' => $data['star'],
        //     'time' => $data['time'],
        //     'image' => $data['image'],
        //     'tag_id' => $tag->id,
        //     'onsenName' => $data['onsenName'],
        //     'formatted_address' => $geocodedData['formatted_address'],
        //     'latitude' => $geocodedData['latitude'],
        //     'longitude' => $geocodedData['longitude'],
        // ])->save();

        return $review;
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
