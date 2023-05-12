<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ReviewStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\GeocodeCalculator;
use App\Traits\OrderByLatest;

class Review extends Model
{
    use HasFactory;
    use OrderByLatest;
    protected $table = 'review';
    protected $fillable = ['content','star','time','user_id','onsenName','tag_id','image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }



    public function scopeWithRelations($query)
    {
        return $query->with(['user', 'tag']);
    }



    public function onsen()
    {
        return $this->belongsTo(Onsen::class, 'onsenName', 'name');
    }



    public function scopeMatchId($query, $id)
    {
        return $query->where('id', $id);
    }



    public function isWrittenByUser(User $user): bool
    {
        return $this->user_id == $user->id;
    }



    public static function searchByOnsenName($keyword)
    {
        return self::where('onsenName', 'LIKE', "%{$keyword}%");
    }


    private static function uploadImage(ReviewStoreRequest $request): string
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            return Storage::disk('s3')->url($path);
        } else {
            return 'images/onsennoimage.jpg';
        }
    }


    public static function createFromRequest(ReviewStoreRequest $request)
    {
        $data = $request->all();

        $data['image'] = self::uploadImage($request);

        return DB::transaction(function () use ($data) {
            $tag = Tag::createFromData($data);

            $geocodedData = GeocodeCalculator::geocodeAddress($data['onsenName']);

            if ($geocodedData === null) {
                $geocodedData = [
                    'latitude' => null,
                    'longitude' => null,
                    'formatted_address' => null,
                ];
            }

            $onsen = Onsen::updateOrGetFromData($data, $geocodedData);

            $review = Review::create([
                'content' => $data['content'],
                'user_id' => $data['user_id'],
                'star' => $data['star'],
                'time' => $data['time'],
                'image' => $data['image'],
                'tag_id' => $tag->id,
                'onsenName' => $data['onsenName']
            ]);

            return $review;
        });
    }



    public static function updateFromRequest(ReviewStoreRequest $request, $id)
    {
        $data = $request->all();

        $tag = Tag::createFromData($data);

        $data['image'] = self::uploadImage($request);

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
