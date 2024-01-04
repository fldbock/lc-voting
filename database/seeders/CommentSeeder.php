<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public const COUNT = 500;
    public function run(): void
    {
        Comment::factory($this::COUNT)->existing()->create();
    }
}
