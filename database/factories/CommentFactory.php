<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Idea;

use Database\Seeders\UserSeeder;
use Database\Seeders\IdeaSeeder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'idea_id' => Idea::factory(),
            'body' => $this->faker->paragraph(5),
        ];
    }

    public function existing(){
        return $this->state(function (array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1,UserSeeder::COUNT),
                'idea_id' => $this->faker->numberBetween(1,IdeaSeeder::COUNT),
            ];
        });
    }
}
