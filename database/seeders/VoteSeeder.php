<?php

namespace Database\Seeders;

use Database\Factories\VoteFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;

use Carbon\Carbon;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = collect(range(1, User::count()));
        $ideaIds = collect(range(1, Idea::count()));

        $possibleVotes = $userIds->crossJoin($ideaIds);
        
        $now = Carbon::now();

        Vote::insert(
            $possibleVotes
            ->random($possibleVotes->count()/4)
            ->map(fn ($item) => [
                'user_id' => $item[0],
                'idea_id' => $item[1],
                'updated_at' => $now,
                'created_at' => $now
            ])
            ->all());
    }
}
