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
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Flor',
            'email'=> 'flor.debock@gmail.com',
        ]);
        
        for ($i = 2; $i <= 20; $i++) {
            User::factory()->create([
                'id'=> $i,
            ]);
        }
    }
}