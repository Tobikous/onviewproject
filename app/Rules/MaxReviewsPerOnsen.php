<?php

namespace App\Rules;

use App\Models\Review;
use Illuminate\Contracts\Validation\Rule;

class MaxReviewsPerOnsen implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $userId = auth()->id();
        $onsenName = $value;

        $userReviews = Review::where('user_id', $userId)->where('onsenName', $onsenName)->count();

        return $userReviews < 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '同じ温泉の投稿は3件までしかできません。';
    }
}
