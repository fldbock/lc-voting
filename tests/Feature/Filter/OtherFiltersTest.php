<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeasIndex;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;
use Database\Seeders\CategorySeeder;

class OtherFiltersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_top_voted_filter_works(){
        $ideaOne = Idea::factory()->create();
        $ideaTwo = Idea::factory()->create();

        Vote::factory(2)->create([
            'idea_id' => $ideaOne->id,            
            ]);

        Vote::factory()->create([
            'idea_id'=> $ideaTwo->id,
            ]);

        Livewire::test(IdeasIndex::class)
            ->set('filter', 'Top Voted')
            ->assertViewHas('ideas', function($ideas) use ($ideaOne){
                return $ideas->first()->id === $ideaOne->id;
            });

        
        Vote::factory(2)->create([
            'idea_id'=> $ideaTwo->id,
            ]);

        Livewire::test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas) use ($ideaTwo){
                return $ideas->first()->id === $ideaTwo->id;
            });
    }   

    /** @test */
    public function test_my_ideas_filter_works(){
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $ideasUserOne = Idea::factory(2)->create([
            'user_id'=> $userOne->id,
        ]);
        $ideasUserTwo = Idea::factory(3)->create([
            'user_id'=> $userTwo->id,
        ]);

        //  Not logged in
        Livewire::test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertRedirect(route('login'));

        //  Logged in as userOne
        Livewire::actingAs($userOne)
            ->test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function($ideas) {
                return $ideas->count() == 2;
            });

        //  Logged in as userTwo
        Livewire::actingAs($userTwo)
            ->test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function($ideas) {
                return $ideas->count() == 3;
            });
    }   

    /** @test */
    public function test_my_ideas_filter_works_with_category_filter(){
        $this->seed(CategorySeeder::class);
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $ideasUserOne = Idea::factory(2)->create([
            'user_id'=> $userOne->id,
            'category_id'=> 1,
        ]);
        $ideasUserTwoCategoryOne = Idea::factory(3)->create([
            'user_id'=> $userTwo->id,
            'category_id'=> 1,
        ]);
        $ideasUserTwoConsidered = Idea::factory(4)->create([
            'user_id'=> $userTwo->id,
            'category_id'=> 2,
        ]);

        //  Logged in as userTwo
        Livewire::actingAs($userTwo)
            ->test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->set('category', 'Category 1')
            ->assertViewHas('ideas', function($ideas) {
                return $ideas->count() == 3;
            });
    }   

    /** @test */
    public function test_no_filter_works(){
        $user = User::factory()->create();

        Idea::factory(3)->create([
            'user_id'=> $user->id,
        ]);

        //  Logged in as userOne
        Livewire::test(IdeasIndex::class)
            ->set('filter', 'No Filter')
            ->assertViewHas('ideas', function($ideas) {
                return $ideas->count() == 3;
            });
    } 
}
