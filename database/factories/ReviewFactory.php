<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tag;
use App\Models\Onsen;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        $onsen = Onsen::factory()->create();
        return [
            'content' => $this->faker->paragraph,
            'star' => $this->faker->numberBetween(1, 5),
            'time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => User::factory(),
            'onsenName' => $onsen->name,
            'onsenName' => $this->faker->unique()->company,
            'tag_id' => Tag::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'nature'),
        ];
    }
}
