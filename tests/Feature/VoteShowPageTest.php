<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeaShow;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\UserSeeder;

use App\Models\Idea;
use App\Models\Vote;

class VoteShowPageTest extends TestCase
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
    public function test_show_page_contains_idea_show_livewire_component(){
        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSuccessful()
            ->assertSeeLivewire('idea-show');
    }   

    /** @test */
    public function test_show_page_correctly_receives_votes_count(){
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

        $this->get(route('idea.show', $idea))
            ->assertViewHas('votesCount', 2);
    }   

        /** @test */
        public function test_votes_count_shows_correctly_on_idea_show_livewire_component(){
            $idea = Idea::factory()->create([
                'title' => 'My First Idea',
                'description' => 'Description for my first idea',
            ]);
            
            Livewire::test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 777898,
            ])
            ->assertSet('votesCount',777898)
            ->assertSee('777898');
        }   
}
