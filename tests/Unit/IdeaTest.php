<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        $idea = Idea::factory()->create();
        
        Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser($userB));
        $this->assertFalse($idea->isVotedByUser(null)); //user not logged in
    }

    /** @test */
    public function test_user_can_vote_on_idea(){
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $idea->toggleVote($user);
        $this->assertTrue($idea->isVotedByUser($user));
        $idea->toggleVote($user);
        $this->assertFalse($idea->isVotedByUser($user));
    }
}
