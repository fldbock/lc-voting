<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

use Livewire\Livewire;
use App\Livewire\DeleteIdea;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;

class DeleteIdeaTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_shows_delete_idea_livewire_when_user_has_authorization(){
        $user = User::factory()->create();
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  
        
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('delete-idea');
        
        // Admin
        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('delete-idea');
    }

    /** @test */
    public function test_does_not_show_delete_idea_livewire_when_user_does_not_have_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  

        // Not logged in
        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('delete-idea');

        // Wrong User
        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('delete-idea');
    }

    /** @test */
    public function test_deleting_an_idea_shows_on_menu_when_user_has_authorization(){
        $user = User::factory()->create();
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  
        
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-delete-idea-li', false);
        
        // Admin
        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-delete-idea-li', false);
    }

    /** @test */
    public function test_deleting_an_idea_does_not_show_on_menu_when_user_does_not_have_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);  

        // Not logged in
        $this->get(route('idea.show', $idea))
            ->assertDontSee('data-test-delete-idea-li', false);

        // Wrong User
        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertDontSee('data-test-delete-idea-li', false);
    }

    /** @test */
    public function test_deleting_an_idea_works_when_user_has_authorization(){
        $user = User::factory()->create();
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Idea',
        ]); 
        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
        ]); 

        Livewire::actingAs($user)
            ->test(DeleteIdea::class, [
                'idea'=> $idea,
            ])
            ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

        $this->assertDatabaseMissing('ideas', [
            'user_id'=> $user->id,
            'Title' => 'My Idea',
        ]);

        // Admin
        Livewire::actingAs($userAdmin)
        ->test(DeleteIdea::class, [
            'idea'=> $ideaTwo,
        ])
        ->call('deleteIdea')
        ->assertRedirect(route('idea.index'));

        $this->assertDatabaseMissing('ideas', [
            'user_id'=> $user->id,
            'Title' => 'My Idea',
        ]);
    }

    /** @test */
    public function test_deleting_an_idea_with_votes_works_when_user_has_authorization(){
        $user = User::factory()->create();
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Idea',
        ]); 
        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
        ]); 

        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $ideaTwo->id,
        ]);

        Livewire::actingAs($user)
            ->test(DeleteIdea::class, [
                'idea'=> $idea,
            ])
            ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

        $this->assertDatabaseMissing('ideas', [
            'user_id'=> $user->id,
            'Title' => 'My Idea',
        ]);

        // Admin
        Livewire::actingAs($userAdmin)
        ->test(DeleteIdea::class, [
            'idea'=> $ideaTwo,
        ])
        ->call('deleteIdea')
        ->assertRedirect(route('idea.index'));

        $this->assertDatabaseMissing('ideas', [
            'user_id'=> $user->id,
            'Title' => 'My Idea',
        ]);

        $this->assertEquals(Vote::count(), 0);
    }

    /** @test */
    public function test_deleting_an_idea_does_not_work_when_user_has_no_authorization(){
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]); 

        // Not logged in
        Livewire::test(DeleteIdea::class, [
                'idea'=> $idea,
            ])
            ->call('deleteIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);       

        // Wrong User
        Livewire::actingAs($userB)
            ->test(DeleteIdea::class, [
                'idea'=> $idea,
            ])
            ->call('deleteIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
