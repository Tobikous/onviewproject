<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['サウナがおすすめ', '昼は混んでた', '天然温泉', '朝方が空いてる', '温泉が広い']),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
