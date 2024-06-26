<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public const COUNT = 20;
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Flor',
            'email'=> 'flor.debock@gmail.com',
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Rolf',
            'email'=> 'rolf.debock@gmail.com',
        ]);
        
        for ($i = 3; $i <= $this::COUNT; $i++) {
            User::factory()->create([
                'id'=> $i,
            ]);
        }
    }
}