<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('home');
    }
}
