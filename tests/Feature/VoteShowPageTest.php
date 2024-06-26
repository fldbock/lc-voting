<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeaShow;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_show_page_contains_idea_show_livewire_component(){
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertSuccessful()
            ->assertSeeLivewire('idea-show');
    }   

    /** @test */
    public function test_show_page_correctly_receives_votes_count(){
        $idea = Idea::factory()->create();

        Vote::factory(2)->create([
            'idea_id' => $idea->id,
        ]);

        $this->get(route('idea.show', $idea))
            ->assertViewHas('votesCount', 2);
    }   

    /** @test */
    public function test_votes_count_shows_correctly_on_idea_show_livewire_component(){
        $idea = Idea::factory()->create();
        
        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 777898,
            'hasVoted' => 0,
        ])
        ->assertSet('votesCount',777898)
        ->assertSee('777898');
    }   
    
    /** @test */
    public function test_show_page_correctly_receives_has_voted(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create();

        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id'=> $idea->id,
        ]);

        // Voted
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertViewHas('hasVoted', true);

        // Not Voted
        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertViewHas('hasVoted', null);

        // Guest
        $this->get(route('idea.show', $idea))
            ->assertViewHas('hasVoted', null);
    }
        
    /** @test */
    public function test_has_voted_shows_correctly_on_idea_index_livewire_component(){
        $user = User::factory()->create();

        $idea = Idea::factory()->create();
        
        $vote = Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        // Voted
        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => $vote->id,
            ])    
            ->AssertSeeHtml('data-test="vote-button-has-voted"')
            ->AssertSeeHtml('data-test-votes-count-blue');
        
        // Not voted
        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => null,
            ])    
            ->AssertDontSeeHtml('data-test="vote-button-has-voted"')
            ->AssertDontSeeHtml('data-test-votes-count-blue');
    }   

     /** @test */
     public function test_clicking_the_vote_button(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create();

        $vote = Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        // Guest should get redirected
        Livewire::test(IdeaShow::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => null,
            ])    
            ->call('vote')
            ->assertRedirect(route('login'));

        // Voted
        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => $vote->id,
            ])    
            ->call('vote')
            ->assertSet('votesCount', 4)
            ->assertSet('hasVoted', false);

        $this->assertDatabaseMissing('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);
        // Not voted
        Livewire::actingAs($userB)
            ->test(IdeaShow::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => null,
            ])    
            ->call('vote')
            ->assertSet('votesCount', 6)
            ->assertSet('hasVoted', true);
        
        $this->assertDatabaseHas('votes', [
            'user_id' => $userB->id,
            'idea_id' => $idea->id,
        ]);
    }
}
