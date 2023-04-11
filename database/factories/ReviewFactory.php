<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentences = [
            'この温泉は素晴らしいです。リラックスできます。アクセスも良いので助かります。血行にもよいのでまた行きたいです。',
            '景色が美しい温泉で、非常にリフレッシュできました。スタッフが親切で、設備も整っているので快適に過ごせました。',
            'スタッフの対応が親切で心地よく、設備も整っていました。温泉に入る前に飲めるお茶も美味しく、リラックスした時間を過ごせました。',
            '温泉の泉質がとても良く、肌がスベスベになりました。また、露天風呂からの眺めが素晴らしく、時間を忘れてリラックスできました。おすすめです！',
            '温泉の周りには美しい自然が広がり、散策しながらリフレッシュできました。温泉の後には地元の食材を使った料理を楽しめるのも魅力的です。',
        ];

        return [
            'user_id' => \App\Models\User::factory(),
            'tag_id' => \App\Models\Tag::factory(),
            'onsenName' => $this->faker->name(),
            'content' => $this->faker->randomElement($sentences),
            'star' => $this->faker->randomElement(['★★★★★', '★★★★☆', '★★★☆☆', '★★☆☆☆', '★☆☆☆☆']),
            'time' => $this->faker->randomElement(['早朝', '昼', '夕方', '夜', '深夜']),
            'formatted_address' => $this->faker->address(),
        ];
    }
}
