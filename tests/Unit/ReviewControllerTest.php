<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
use App\Models\Tag;
use App\Models\Onsen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    // create アクションのテスト
    public function test_create()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('create'));

        $response->assertStatus(200);
    }

    // store アクションのテスト
    public function test_store()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);


        $reviewData = [
            'onsenName' =>'例の温泉',
            'star' => '★★★★☆',
            'time' => '早朝',
            'area' => '東京都',
            'content' => 'This is a test review.',
            'tag' => $tag->name,
            'user_id' => $user->id,
        ];

        $onsen = Onsen::create([
            'name'=>$reviewData['onsenName'],
            'area' =>$reviewData['area']
        ]);

        $response = $this->actingAs($user)->post(route('store'), $reviewData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect(route('home'));

        // データが保存されたことを確認する
        $this->assertDatabaseHas('review', [
            'onsenName' => $onsen->name,
            'user_id' => $user->id,
            'star' => '★★★★☆',
            'time' => '早朝',
            'content' => 'This is a test review.',
            'tag_id' => $tag->id,
        ]);
    }

    // edit アクションのテスト
    public function test_edit()
    {
        $review = Review::factory()->create();
        $response = $this->actingAs($review->user)->get(route('edit', ['id' => $review->id]));

        $response->assertStatus(200);
    }

    // update アクションのテスト
    public function test_update()
    {
        $review = Review::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $review->user_id]);


        $updatedData = [
            'content' => 'Updated content',
            'star' =>'★★★★☆',
            'time' => 'afternoon',
            'tag' => $tag->name,
            'user_id' => $review->user_id,
            'onsenName' => '例の温泉',
            'tag_id' => $tag->id
        ];

        $onsen = Onsen::create([
            'name'=>$updatedData['onsenName'],
            'area' => '東京都',
        ]);


        $response = $this->actingAs($review->user)->post(route('update', ['id' => $review->id]), $updatedData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect(route('home'));

        // データが更新されたことを確認する
        $this->assertDatabaseHas('review', [
            'id' => $review->id,
            'content' => 'Updated content',
            'star' =>'★★★★☆',
            'time' => 'afternoon',
            'tag_id' => $tag->id,
        ]);
    }

    // delete アクションのテスト
    public function test_delete()
    {
        $review = Review::factory()->create();
        $response = $this->actingAs($review->user)->post(route('delete', ['id' => $review->id]));

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect(route('home'));

        // データが削除されたことを確認する
        $this->assertDatabaseMissing('review', ['id' => $review->id]);
    }
}
