<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'slug' => Str::slug($this->faker->sentence()).time(),
            'user_id' => $user->id,
        ];
    }
}
