<?php

namespace Database\Factories;

use App\Models\Autobot;
use App\Services\AutobotService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autobot>
 */
class AutobotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'username' => fake()->userName,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'website' => '',
            'address' => [],
            'company' => []
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Autobot $autobot) {
            // ...
        })->afterCreating(function (Autobot $autobot) {
            AutobotService::dispatchAutobotPostCreation($autobot);
        });
    }
}
