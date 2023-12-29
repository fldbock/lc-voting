<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

use Livewire\Livewire;
use App\Livewire\EditIdea;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Category;
use App\Models\Idea;

class EditIdeaTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_shows_edit_idea_livewire_when_user_has_authorization(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-idea');
    }

    /** @test */
    public function test_does_not_show_edit_idea_livewire_when_user_does_not_have_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  
        $ideaTwoHoursAgo = Idea::factory()->create([
            'user_id'=> $user->id,
            'created_at' => Carbon::now()->subHour(2),
        ]);

        // Not logged in
        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('edit-idea');

        // Wrong User
        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('edit-idea');

        // Too much time has past
        $this->actingAs($user)
            ->get(route('idea.show', $ideaTwoHoursAgo))
            ->assertDontSeeLivewire('edit-idea');
    }

    /** @test */
    public function test_editing_an_idea_shows_on_menu_when_user_has_authorization(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-edit-idea-li', false);
    }

    /** @test */
    public function test_editing_an_idea_does_not_show_on_menu_when_user_does_not_have_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  
        $ideaTwoHoursAgo = Idea::factory()->create([
            'user_id'=> $user->id,
            'created_at' => Carbon::now()->subHour(2),
        ]);

        // Not logged in
        $this->get(route('idea.show', $idea))
            ->assertDontSee('data-test-edit-idea-li', false);

        // Wrong User
        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertDontSee('data-test-edit-idea-li', false);

        // Too much time has past
        $this->actingAs($user)
            ->get(route('idea.show', $ideaTwoHoursAgo))
            ->assertDontSee('data-test-edit-idea-li', false);
    }
    /** @test */
    public function test_edit_idea_form_validation_works(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]); 

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea'=> $idea,
            ])
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('updateIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
    }


    /** @test */
    public function test_editing_an_idea_works_when_user_has_authorization(){
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create();
        $categoryTwo = Category::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id
        ]); 

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea'=> $idea,
            ])
            ->set('title', 'My New Title')
            ->set('category', $categoryTwo->id)
            ->set('description', 'My New Description')
            ->call('updateIdea')
            ->assertDispatched('ideaWasUpdated');

        $this->assertDatabaseHas('ideas', [
            'user_id'=> $user->id,
            'category_id' => $categoryTwo->id,
            'title' => 'My New Title',
            'description'=> 'My New Description',
        ]);
    }

    /** @test */
    public function test_editing_an_idea_does_not_work_when_user_has_no_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $categoryOne = Category::factory()->create();
        $categoryTwo = Category::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id
        ]); 

        $ideaTwoHoursAgo = Idea::factory()->create([
            'user_id'=> $user->id,
            'created_at' => Carbon::now()->subHour(2),
        ]);

        // Not logged in
        Livewire::test(EditIdea::class, [
                'idea'=> $idea,
            ])
            ->set('title', 'My New Title')
            ->set('category', $categoryTwo->id)
            ->set('description', 'My New Description')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);       

        // Wrong User
        Livewire::actingAs($userB)
            ->test(EditIdea::class, [
                'idea'=> $idea,
            ])
            ->set('title', 'My New Title')
            ->set('category', $categoryTwo->id)
            ->set('description', 'My New Description')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);

        // Too much time has past
        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea'=> $ideaTwoHoursAgo,
            ])
            ->set('title', 'My New Title')
            ->set('category', $categoryTwo->id)
            ->set('description', 'My New Description')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
