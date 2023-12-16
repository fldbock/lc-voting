<?php

namespace Tests\Feature;

use App\Models\Idea;
use App\Models\Category;

use Database\Seeders\CategorySeeder;

use Closure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class ShowIdeasTests extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(CategorySeeder::class);
    }
    
    /** @test */
    public function test_list_of_ideas_shows_on_main_page(){
        //  Arrange
        $categoryOne = Category::factory()->create(['name' => 'Unique Category']);
        $categoryTwo = Category::factory()->create(['name' => 'Really Unique Category']);
        
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'description' => 'Description of my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'category_id' => $categoryTwo->id,
            'description' => 'Description of my second idea',
        ]);

        // Act
        $response = $this->get(route('idea.index'));

        // Assert
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);

        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
    }

    /** @test */
    public function test_single_idea_shows_correctly_on_the_show_page(){
        //  Arrange
        $category = Category::factory()->create(['name' => 'Unique Category']);

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id'=> $category->id,
            'description' => 'Description of my first idea',
        ]);

        // Act
        $response = $this->get(route('idea.show', $idea));

        // Assert
        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($category->name);
    }

    /** @test */
    public function test_ideas_pagination_works(){
        //  Arrange       
        $category = Category::factory()->create(['name' => 'Category 1']);
        $ideaOnFirstPage = Idea::factory()->create([
            'title' => 'My Idea On The First Page',
            'category_id'=> $category->id,
        ]);

        // Trick to get the number of ideas displayed per page
        $closure = function(){return $this->perPage;};
        $perPage = Closure::bind($closure, $ideaOnFirstPage, 'App\Models\Idea')();
        
        Idea::factory($perPage-1)->create(['category_id'=> $category->id]);

        $ideaOnSecondPage = Idea::factory()->create([
            'title' => 'My Idea On The Second Page',
            'category_id'=> $category->id,
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
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id'=> $categoryOne->id,
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id'=> $categoryOne->id,
        ]);

        $this->assertNotSame($ideaOne->slug, $ideaTwo->slug);
    }
}
