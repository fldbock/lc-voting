<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\StatusFilters;
use App\Livewire\IdeasIndex;

use Database\Seeders\StatusSeeder;

use App\Models\User;
use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

class StatusFiltersTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(StatusSeeder::class);
    }

    /** @test 
     * Existence Test
    */
    public function test_index_page_contains_status_filters_livewire_component(){
        $this->get(route('idea.index'))
            ->assertSuccessful()
            ->assertSeeLivewire('status-filters');
    }   

    /** @test 
     * Existence Test
    */
    public function test_show_page_contains_status_filters_livewire_component(){
        $this->get(route('idea.show', Idea::factory()->create()))
            ->assertSuccessful()
            ->assertSeeLivewire('status-filters');
    }   

    /** @test */
    public function test_shows_correct_status_count(){
        Idea::factory(37)->create([
            'status_id'=> 4,//status Implemented
        ]);
        Idea::factory(5)->create([
            'status_id' => 5, //status Considering
        ]);

        Livewire::test(StatusFilters::class)
            ->assertSuccessful()
            ->assertSee("Implemented (37)")
            ->assertSee("All Ideas (42)");
    } 

    /** @test */
    public function test_filtering_works_when_query_string_in_place(){
        Idea::factory(2)->create([
            'status_id'=> 4,//status Implemented
        ]);
        Idea::factory(3)->create([
            'status_id' => 5, //status Considering
        ]);

        Livewire::withQueryParams([
            'status' => 'Implemented',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 2;
            });
    
    } 

    /** @test */
    public function test_index_page_shows_selected_status(){
        $idea = Idea::factory(5)->create([
            'status_id'=> 4,//status Implemented
        ]);

        $response = $this->get(route('idea.index'))
                        ->assertSuccessful()
                        ->assertSee('border-blue text-gray-900',false);
    } 


    /** @test */
    public function test_shows_page_does_not_show_selected_status(){
        $idea = Idea::factory()->create([
            'status_id'=> 4,//status Implemented
        ]);

        $response = $this->get(route('idea.show', $idea))
                        ->assertSuccessful()
                        ->assertDontSee('border-blue text-gray-900',false);
    } 

}
