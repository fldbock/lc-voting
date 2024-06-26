<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idea;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public const COUNT = 100;
    public function run(): void
    {
        Idea::factory($this::COUNT)->existing()->create();
    }
}
