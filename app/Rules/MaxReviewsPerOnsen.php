<?php

namespace App\Rules;

use App\Models\Review;
use Illuminate\Contracts\Validation\Rule;

class MaxReviewsPerOnsen implements Rule
{
    protected $update;

    public function __construct($update)
    {
        $this->update = $update;
    }

    public function passes($attribute, $value)
    {
        if ($this->update) {
            return true;
        }

        $user_id = request()->input('user_id');
        $onsenName = $value;

        $userReviews = Review::where('user_id', $user_id)->where('onsenName', $onsenName)->count();

        return $userReviews < 3;
    }


    public function message()
    {
        return '同じ温泉の投稿は3件までしかできません。';
    }
}
