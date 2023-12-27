<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;
use App\Livewire\IdeasIndex;

use App\Models\Idea;
use App\Models\Category;
use Database\Seeders\CategorySeeder;

class SearchFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_does_not_perform_seach_if_less_than_3_characters(){
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
        ]);
        $ideaThree = Idea::factory()->create([
            'title' => 'My Third Idea',
        ]);        

        Livewire::test(IdeasIndex::class)
            ->set('search', 'Se')
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() === 3;
            });
    }

    /** @test */
    public function test_searching_works_when_more_than_3_characters(){
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
        ]);
        $ideaThree = Idea::factory()->create([
            'title' => 'My Third Idea',
        ]);        

        Livewire::test(IdeasIndex::class)
            ->set('search', 'Second')
            ->assertViewHas('ideas', function($ideas) use($ideaTwo){
                return $ideas->count() === 1
                    && $ideas->first()->id === $ideaTwo->id;
            });
    }

    /** @test */
    public function test_search_works_correctly_with_category_filters(){
        $this->seed(CategorySeeder::class);
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => 1,
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'category_id' => 2,
        ]);
        $ideaThree = Idea::factory()->create([
            'title' => 'My Third Idea',
            'category_id' => 3,
        ]);        

        Livewire::test(IdeasIndex::class)
            ->set('search', 'Idea')
            ->set('category', 'Category 1')
            ->assertViewHas('ideas', function($ideas) use($ideaOne){
                return $ideas->count() === 1
                    && $ideas->first()->id === $ideaOne->id;
            });
    }

    /** @test */
    public function test_displays_message_with_svg_if_no_matches_found(){
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
        ]);
        $ideaThree = Idea::factory()->create([
            'title' => 'My Third Idea',
        ]);        

        Livewire::test(IdeasIndex::class)
            ->set('search', 'Four')
            ->assertSee("data-test-no-ideas-svg");
    }
}
