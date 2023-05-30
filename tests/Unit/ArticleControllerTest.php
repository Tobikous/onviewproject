<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;


    public function testIndex()
    {
        $onsens = Onsen::factory()->create();
        $review = Review::factory()->create(['onsenName' => $onsens->name]);
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function testReviewContent()
    {
        $onsens = Onsen::factory()->create();
        $review = Review::factory()->create(['onsenName' => $onsens->name]);
        $onsen = Onsen::where('name', $review->onsenName)->first();

        $response = $this->get("/review/{$review->id}");

        $response->assertStatus(200);
    }




    public function testOnsenContent()
    {
        $onsen = Onsen::factory()->create();

        $response = $this->get("/onsen/{$onsen->id}");

        $response->assertStatus(200);
    }


    public function testFilterByArea()
    {
        $response = $this->get('/onsen_filter');

        $response->assertStatus(200);
    }


    public function testReviewLists()
    {
        $response = $this->get('/review_lists');

        $response->assertStatus(200);
    }


    public function testOnsenLists()
    {
        $response = $this->get('/onsen_lists');

        $response->assertStatus(200);
    }


    public function testReviewSearch()
    {
        $onsenCount = 5;
        $keyword = 'test_onsen';

        for ($i = 0; $i < $onsenCount; $i++) {
            $onsen = Onsen::factory()->create(['name' => $keyword]);
            Review::factory()->create(['onsenName' => $onsen->name]);
        }

        $response = $this->get('/review_search?keyword=' . $keyword);

        $response->assertStatus(200);
        $response->assertViewHas('reviews', function ($reviews) use ($onsenCount) {
            return count($reviews) == $onsenCount;
        });
    }

    public function testOnsenSearch()
    {
        $onsenCount = 5;
        $keyword = 'test_onsen';

        for ($i = 0; $i < $onsenCount; $i++) {
            $onsen = Onsen::factory()->create(['name' => $keyword]);
            Review::factory()->create(['onsenName' => $onsen->name]);
        }

        $response = $this->get('/onsen_search?keyword=' . $keyword);

        $response->assertStatus(200);
        $response->assertViewHas('onsens', function ($onsens) use ($onsenCount) {
            return count($onsens) == $onsenCount;
        });
        $response->assertViewHas('reviews', function ($reviews) use ($onsenCount) {
            return count($reviews) == $onsenCount;
        });
    }




    public function testTagSearch()
    {
        $review = Review::factory()->create();

        $response = $this->get("/tag/{$review->tag_id}");

        $response->assertStatus(200);
    }
}
