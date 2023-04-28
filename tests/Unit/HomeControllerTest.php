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
        // ユーザーを作成して認証します
        $user = User::factory()->create();
        $this->actingAs($user);

        // ホームページにアクセスします
        $response = $this->get('/');

        // ステータスコードが200であることを確認します
        $response->assertStatus(200);

        // レスポンスに'home'ビューが含まれていることを確認します
        $response->assertViewIs('home');
    }
}
