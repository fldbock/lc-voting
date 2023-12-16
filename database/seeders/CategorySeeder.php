<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(['id' => 1, 'name' => 'Category 1']);
        Category::factory()->create(['id' => 2, 'name' => 'Category 2']);
        Category::factory()->create(['id' => 3, 'name' => 'Category 3']);
        Category::factory()->create(['id' => 4, 'name' => 'Category 4']);
    }
}
