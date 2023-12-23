<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeasIndex;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\UserSeeder;

use App\Models\User;
use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

class CategoryFiltersTest extends TestCase
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
    public function test_selecting_a_category_filters_correctly(){
        Idea::factory(2)->create([
            'category_id'=> 1,
        ]);
        Idea::factory(3)->create([
            'category_id' => 2,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('category', 'Category 1')
            ->assertViewHas('ideas', function($ideas){
                foreach ($ideas as $idea){
                    if ($idea->category_id !== 1){
                        return false;
                    }                    
                }
                if ($ideas->count() !== 2){
                    return false;
                }
                return true;
            })
            ->set('category', 'All Categories')
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 5;
            });
    }   

    /** @test */
    public function test_category_query_string_filters_correctly(){
        Idea::factory(2)->create([
            'category_id'=> 1,
        ]);
        Idea::factory(3)->create([
            'category_id' => 2,
        ]);

        Livewire::withQueryParams([
            'category'=> 'Category 1',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                foreach ($ideas as $idea){
                    if ($idea->category_id !== 1){
                        return false;
                    }                    
                }
                if ($ideas->count() !== 2){
                    return false;
                }
                return true;
            });
        
        Livewire::withQueryParams([
            'category'=> 'All Categories',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 5;
            });            
    }   

    /** @test */
    public function test_selecting_a_status_and_a_category_filters_correctly(){
        Idea::factory(2)->create([
            'category_id'=> 1,
            'status_id' => 4,//status Implemented
        ]);
        Idea::factory(3)->create([
            'category_id'=> 1,
            'status_id' => 5,//status Considering
        ]);

        Idea::factory(4)->create([
            'category_id'=> 2,
            'status_id' => 4,//status Implemented
        ]);

        Idea::factory(5)->create([
            'category_id'=> 2,
            'status_id' => 5,//status Considering
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('category', 'Category 1')
            ->set('status', 'Implemented')
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 2;
            })
            ->set('category', 'All Categories')
            ->set('status', 'Implemented')
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 6;
            })
            ->set('category', 'Category 1')
            ->set('status', 'All')
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 5;
            });
    } 
    /** @test */
    public function test_category_status_query_string_filters_correctly(){
        Idea::factory(2)->create([
            'category_id'=> 1,
            'status_id' => 4,//status Implemented
        ]);
        Idea::factory(3)->create([
            'category_id'=> 1,
            'status_id' => 5,//status Considering
        ]);

        Idea::factory(4)->create([
            'category_id'=> 2,
            'status_id' => 4,//status Implemented
        ]);

        Idea::factory(5)->create([
            'category_id'=> 2,
            'status_id' => 5,//status Considering
        ]);

        Livewire::withQueryParams([
            'category'=> 'Category 1',
            'status' => 'Implemented',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 2;
            });
        
        Livewire::withQueryParams([
            'category'=> 'All Categories',
            'status' => 'Implemented',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 6;
            });       
            
        Livewire::withQueryParams([
            'category'=> 'Category 1',
            'status' => 'All',
            ])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 5;
            });   
    }   
}
