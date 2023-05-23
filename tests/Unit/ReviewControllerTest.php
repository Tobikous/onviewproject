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


    public function testCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/create');

        $response->assertStatus(200);
    }


    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $reviewData = Review::factory()->raw(['user_id' => $user->id]);

        $response = $this->post('/store', $reviewData);

        $response=$this->get('/');
        $response->assertStatus(200);
    }


    public function testEdit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->get("/edit/{$review->id}");

        $response->assertStatus(200);
    }


    public function testUpdate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $updatedReviewData = Review::factory()->raw(['user_id' => $user->id]);

        $response = $this->post("/update/{$review->id}", $updatedReviewData);

        $response=$this->get('/');
        $response->assertStatus(200);
    }


    public function testDelete()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->post("/delete/{$review->id}");

        $response=$this->get('/');
        $response->assertStatus(200);
    }
}
