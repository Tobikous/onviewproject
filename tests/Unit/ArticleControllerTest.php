<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Tag;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_article()
    {
        $user = User::factory()->create();
        $reviews = Review::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('articles'));

        $response->assertStatus(200);
        $response->assertViewIs('article');
        $response->assertViewHasAll(['loggedInUser', 'reviews']);
    }

    public function test_reviewContent()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $review = Review::factory()->create(['user_id' => $user->id,]);
        $tag = Tag::factory()->create(['user_id' => $user->id]);


        $response = $this->actingAs($user)->get(route('review', ['id' => $review->id]));

        $response->assertStatus(200);
        $response->assertViewIs('show');
        $response->assertViewHasAll(['loggedInUser', 'review']);
    }

    public function test_search()
    {
        $user = User::factory()->create();
        $review = Review::factory()->create(['user_id' => $user->id]);
        $keyword = '温泉検索テスト';

        $response = $this->actingAs($user)->get(route('search', ['keyword' => $keyword]));

        $response->assertStatus(200);
        $response->assertViewIs('search-result');
        $response->assertViewHasAll(['reviews', 'keyword']);
    }

    public function test_tagSearch()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('tag', ['id' => $tag->id]));

        $response->assertStatus(200);
        $response->assertViewIs('search-result');
        $response->assertViewHasAll(['tagName', 'reviews']);
    }
}
