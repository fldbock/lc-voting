<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Category;
use App\Models\Status;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,User::count()),
            'category_id' => $this->faker->numberBetween(1,Category::count()),
            'status_id' => $this->faker->numberBetween(1,Status::count()),
            'title' => ucwords($this->faker->words(4, true)),
            'description' => $this->faker->paragraph(5),            
        ];
    }
}
