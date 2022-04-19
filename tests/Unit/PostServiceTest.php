<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    public function test_create_post_by_admin()
    {
        $post = \App\Services\Posts::init()->create([
            'title' => 'Test',
            'description' => 'this is a post body'
        ], true);
        $this->assertTrue($post->user->email === config('settings.admin-user.email'));
    }

    public function test_create_user_post()
    {
        $user = User::factory()->create();
        $this->be($user);

        $post = \App\Services\Posts::init()->create([
            'title' => 'Test',
            'description' => 'this is a post body'
        ]);
        $this->assertTrue($post->user->id === $user->id);
    }
}
