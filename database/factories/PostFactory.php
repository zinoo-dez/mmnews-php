<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'news_category_id' => rand(1, 5),
            'user_id' => rand(1, 5),
            'name' => fake()->name(),
            'photo' => fake()->imageUrl(300, 300, '.jpeg'),
            'description' => fake()->sentence(10),
            'featured' => 0
        ];
    }
}
