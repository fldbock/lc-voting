<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

class IdeaTest extends TestCase
{

    use RefreshDatabase;    
    
    /** @test */
    public function test_can_check_if_idea_is_voted_for_by_user(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id'=> $category->id,
            'status_id'=> $status->id,
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);
        
        Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser($userB));
        $this->assertFalse($idea->isVotedByUser(null)); //user not logged in
    }
}
