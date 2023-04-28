<?php

namespace Database\Factories;

use App\Models\Onsen;
use Illuminate\Database\Eloquent\Factories\Factory;

class OnsenFactory extends Factory
{
    protected $model = Onsen::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'area' => $this->faker->word(),
        ];
    }
}
