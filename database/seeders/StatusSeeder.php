<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create(['id' => 1, 'name' => 'Open']);
        Status::factory()->create(['id' => 2, 'name' => 'Considering']);
        Status::factory()->create(['id' => 3, 'name' => 'In Progress']);
        Status::factory()->create(['id' => 4, 'name' => 'Implemented']);
        Status::factory()->create(['id' => 5, 'name' => 'Closed']);
    }
}
