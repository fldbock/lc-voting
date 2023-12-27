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
    protected $USER_COUNT = 20;
    protected $CATEGORY_COUNT = 4;
    protected $STATUS_COUNT = 5;
    public function definition(): array
    {
        
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'status_id' => Status::factory(),
            'title' => ucwords($this->faker->words(4, true)),
            'description' => $this->faker->paragraph(5),            
        ];
    }

    public function existing(){
        return $this->state(function (array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1,$this->USER_COUNT),
                'category_id' => $this->faker->numberBetween(1,$this->CATEGORY_COUNT),
                'status_id' => $this->faker->numberBetween(1,$this->STATUS_COUNT),
            ];
        });
    }
}
