<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_display_posts_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_display_dashboard_page_401(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_display_dashboard_page(): void
    {
        $user = User::factory()->create();
        $user->assignRole(config('settings.user_types.user'));

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_display_dashboard_page_error_403(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(403);
    }

    public function test_user_allowed_to_display_create_posts_page()
    {
        $user = User::factory()->create();
        $user->assignRole(config('settings.user_types.user'));

        $response = $this->actingAs($user)->get('/posts/create');
        $response->assertStatus(200);
    }

    public function test_user_not_to_display_create_posts_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts/create');
        $response->assertStatus(403);
    }

    public function test_user_create_post()
    {
        $user = User::factory()->create();
        $user->assignRole(config('settings.user_types.user'));

        $response = $this->actingAs($user)->post('/posts/create', [
            'title' => 'Test POST',
            'description' => 'Sunt autem odit fugit qui sequi quod repellendus qui odio.',
        ]);
        $response->assertRedirect('/dashboard');
    }
}
