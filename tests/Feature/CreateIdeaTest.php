<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;

use App\Models\User;
use App\Models\Idea;

use App\Livewire\CreateIdea;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_create_idea_form_does_not_show_when_logged_out(){
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee('Please login to create an idea.');
        $response->assertDontSee("Let us know what you would like and we'll take a look over!", false);
    }

    /** @test */
    public function test_create_idea_form_does_show_when_logged_in(){
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertDontSee('Please login to create an idea.');
        $response->assertSee("Let us know what you would like and we'll take a look over!", false);
    }

    /** @test */
    public function test_main_page_contains_create_idea_livewire_component(){
        $response = $this->actingAs(User::factory()->create())
            ->get(route('idea.index'))
            ->assertSeeLivewire('create-idea');
    }

    /** @test */
    public function test_create_idea_form_validation_works(){
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
    }

    /** @test */
    public function test_creating_an_idea_works_correctly(){
        $this->seed(CategorySeeder::class);
        $this->seed(StatusSeeder::class);
        $user = User::factory()->create();
        //  Assert redirect
        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My first idea')
            ->set('category', 1)
            ->set('description', 'This is my first idea')
            ->call('createIdea')
            ->assertRedirect('/');
        
        // Assert Idea on index page
        $response = $this->actingAs($user)->get(route(('idea.index')));
        $response->assertSuccessful();
        $response->assertSee('This is my first idea');

        // Assert you automatically voted for this idea
        $createdIdea = $user->votes()->first();
        
        $this->assertTrue($createdIdea && $createdIdea->description == 'This is my first idea');
    }
}

