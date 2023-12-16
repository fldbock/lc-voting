<?php

namespace Database\Seeders;
use Database\Seeders\IdeaSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Run Idea Seeder, this will also create unique users for these Ideas
        $this->call(CategorySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(IdeaSeeder::class);
    }
}
