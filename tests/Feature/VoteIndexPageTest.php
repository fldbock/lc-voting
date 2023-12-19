<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeaIndex;
use App\Livewire\IdeasIndex;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\UserSeeder;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
        $this->seed(CategorySeeder::class);
        $this->seed(StatusSeeder::class);
    }

    /** @test */
    public function test_index_page_contains_idea_index_livewire_component(){
        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        $this->get(route('idea.index'))
            ->assertSuccessful()
            ->assertSeeLivewire('idea-index');
    }  

        /** @test */
        public function test_ideas_index_livewire_component_correctly_receives_votes_count(){
            $idea = Idea::factory()->create([
                'title' => 'My First Idea',
                'description' => 'Description for my first idea',
            ]);
    
            $voteOne = Vote::factory()->create([
                'user_id' => 1,
                'idea_id' => $idea->id,
            ]);
    
            $voteTwo = Vote::factory()->create([
                'user_id' => 2,
                'idea_id' => $idea->id,
            ]);
    
            Livewire::test(IdeasIndex::class)
                ->assertViewHas('ideas', function($ideas){
                    return $ideas->first()->votes_count == 2;
                });
        }   
        /** @test */
        public function test_votes_count_shows_correctly_on_idea_index_livewire_component(){
            $idea = Idea::factory()->create([
                'title' => 'My First Idea',
                'description' => 'Description for my first idea',
            ]);
            
            Livewire::test(IdeaIndex::class, [
                'idea' => $idea,
                'votesCount' => 777898,
                'hasVoted' => 1,
            ])
            ->assertSet('votesCount',777898)
            ->assertSee('777898');
        }   
    /** @test */
    public function test_ideas_index_livewire_component_correctly_receives_has_voted(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        $voteOne = Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        // Voted
        Livewire::actingAs($user)
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->first()->voted_by_user == true;
            });
        // Not Voted
        Livewire::actingAs($userB)
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->first()->voted_by_user == false;
            });

        // Guest
        Livewire::test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->first()->voted_by_user == false;
            });
    }
    
       /** @test */
       public function test_has_voted_shows_correctly_on_idea_index_livewire_component(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);
        
        $vote = Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        // Voted
        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => $vote->id,
            ])    
            ->AssertSeeHtml('data-test="vote-button-has-voted"')
            ->AssertSeeHtml('data-test-votes-count-blue');
        
        // Not voted
        Livewire::actingAs($userB)
            ->test(IdeaIndex::class, [
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

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);

        $vote = Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        // Guest should get redirected
        Livewire::test(IdeaIndex::class, [
                'idea'=> $idea,
                'votesCount' => 5,
                'hasVoted' => null,
            ])    
            ->call('vote')
            ->assertRedirect(route('login'));

        // Voted
        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
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
            ->test(IdeaIndex::class, [
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
