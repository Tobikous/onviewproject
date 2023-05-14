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

    /**
     * Test the create review page
     *
     * @return void
     */
    public function testCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    /**
     * Test the store review function
     *
     * @return void
     */
    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $reviewData = Review::factory()->raw(['user_id' => $user->id]);

        $response = $this->post('/store', $reviewData);

        $response->assertRedirect(route('review_lists'));
        $this->assertDatabaseHas('reviews', $reviewData);
    }

    /**
     * Test the edit review page
     *
     * @return void
     */
    public function testEdit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->get("/edit/{$review->id}");

        $response->assertStatus(200);
    }

    /**
     * Test the update review function
     *
     * @return void
     */
    public function testUpdate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $updatedReviewData = Review::factory()->raw(['user_id' => $user->id]);

        $response = $this->post("/update/{$review->id}", $updatedReviewData);

        $response->assertRedirect(route('mypage.reviews'));
        $this->assertDatabaseHas('reviews', $updatedReviewData);
    }

    /**
     * Test the delete review function
     *
     * @return void
     */
    public function testDelete()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->post("/delete/{$review->id}");

        $response->assertRedirect(route('mypage.reviews'));
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }

    /**
     * Test the edit review page access for the review owner
     *
     * @return void
     */
    public function testEditAccessForOwner()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->get("/edit/{$review->id}");

        $response->assertStatus(200);
    }

    /**
     * Test the edit review page access for other users
     *
     * @return void
     */
    public function testEditAccessForOthers()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->actingAs($otherUser);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this->get("/edit/{$review->id}");

        $response->assertStatus(403); // or redirect, depending on your implementation
    }

    /**
     * Test the update review function for invalid data
     *
     * @return void
     */
    public function testUpdateWithInvalidData()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $review = Review::factory()->create(['user_id' => $user->id]);

        $invalidReviewData = ['content' => '']; // assuming content can't be empty

        $response = $this->post("/update/{$review->id}", $invalidReviewData);

        $response->assertSessionHasErrors('content');
    }
}
