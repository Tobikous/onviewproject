<?php

namespace Database\Factories;

use App\Models\Onsen;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OnsenFactory extends Factory
{
    protected $model = Onsen::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company,
            'area' => $this->faker->city,
            'evaluation' => $this->faker->numberBetween(1, 5),
            'formatted_address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'phone_number' => $this->faker->phoneNumber,
            'URL' => $this->faker->url,
            'nearest_station' => $this->faker->streetName,
            'regular_holiday' => $this->faker->dayOfWeek,
        ];
    }
}
