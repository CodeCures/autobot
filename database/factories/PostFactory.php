<?php

namespace Database\Factories;

use App\Models\Post;
use App\Services\AutobotService;
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
            'title' => fake()->text(),
            'body' => fake()->paragraph(5)
        ];
    }


    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Post $post) {
            // ...
        })->afterCreating(function (Post $post) {
            AutobotService::dispatchAutobotPostCommentCreation($post);
        });
    }
}
