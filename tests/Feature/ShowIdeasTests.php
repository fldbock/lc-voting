<?php

namespace Tests\Feature;

use App\Models\Idea;
use Closure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class ShowIdeasTests extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_list_of_ideas_shows_on_main_page(){
        //  Arrange
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'description' => 'Description of my second idea',
        ]);

        // Act
        $response = $this->get(route('idea.index'));

        // Assert
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }

    /** @test */
    public function test_single_idea_shows_correctly_on_the_show_page(){
        //  Arrange
        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);

        // Act
        $response = $this->get(route('idea.show', $idea));

        // Assert
        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
    }

    /** @test */
    public function test_ideas_pagination_works(){
        //  Arrange       

        $ideaOnFirstPage = Idea::factory()->create([
            'title' => 'My Idea On The First Page',
            'description' => 'Description of my first idea',
        ]);

        // Trick to get the number of ideas displayed per page
        $closure = function(){return $this->perPage;};
        $perPage = Closure::bind($closure, $ideaOnFirstPage, 'App\Models\Idea')();
        
        Idea::factory($perPage-1)->create();

        $ideaOnSecondPage = Idea::factory()->create([
            'title' => 'My Idea On The Second Page',
        ]);

        // Act
        $response = $this->get(route('idea.index'));

        // Assert
        $response->assertSuccessful();
        $response->assertSee($ideaOnFirstPage->title);
        $response->assertDontSee($ideaOnSecondPage->title);

        // Act
        $response = $this->get('/?page=2');

        // Assert
        $response->assertSuccessful();
        $response->assertSee($ideaOnSecondPage->title);
        $response->assertDontSee($ideaOnFirstPage->title);
    }

    /** @test */
    public function test_same_idea_title_different_slugs(){
        //  Arrange
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);

        $this->assertNotSame($ideaOne->slug, $ideaTwo->slug);
    }

}
