<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

use Livewire\Livewire;
use App\Livewire\MarkIdeaAsSpam;
use App\Livewire\MarkIdeaAsNotSpam;

use App\Models\User;
use App\Models\Idea;
use App\Models\Vote;

class SpamManagementTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_shows_mark_idea_as_spam_livewire_component_when_user_is_logged_in(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create();  
        
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function test_does_not_show_mark_idea_as_spam_livewire_component_when_not_logged_in(){
        $idea = Idea::factory()->create();  
        
        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function test_shows_mark_idea_as_not_spam_livewire_component_when_user_is_admin(){
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create();  
        
        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-idea-as-not-spam');
    }

    /** @test */
    public function test_does_not_show_mark_idea_as_not_spam_livewire_component_when_user_is_not_admin(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create();  

        // Guest
        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-not-spam');

        // Not Admin
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-not-spam');
    }

    /** @test */
    public function test_mark_idea_as_spam_shows_on_menu_when_user_is_logged_in(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create();  
        
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-mark-idea-as-spam-li', false);
    }

    /** @test */
    public function test_mark_idea_as_spam_does_not_show_on_menu_when_not_logged_in(){
        $idea = Idea::factory()->create();  
        
        $this->get(route('idea.show', $idea))
            ->assertDontSee('data-test-mark-idea-as-spam-li', false);
    }

    /** @test */
    public function test_mark_idea_as_not_spam_shows_on_menu_when_user_is_admin(){
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create();  
        
        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-mark-idea-as-not-spam-li', false);
    }

    /** @test */
    public function test_mark_idea_as_not_spam_does_not_show_on_menu_when_user_is_not_admin(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create();  

        // Guest
        $this->get(route('idea.show', $idea))
            ->assertDontSee('data-test-mark-idea-as-not-spam-li', false);

        // Not Admin
        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertDontSee('data-test-mark-idea-as-not-spam-li', false);
    }

    /** @test */
    public function test_shows_spam_reports_counter_when_user_is_admin(){
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'spam_reports' => 1,
        ]);  
        
        $this->actingAs($userAdmin)
            ->get(route('idea.index'))
            ->assertSee('data-test-spam-reports-counter', false);

        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSee('data-test-spam-reports-counter', false);
    }

    /** @test */
    public function test_does_not_show_spam_reports_counter_when_user_is_not_admin(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'spam_reports' => 1,
        ]); 

        // Guest
        $this->get(route('idea.index'))
            ->assertDontSee('data-test-spam-reports-counter', false);
        
        $this->get(route('idea.show', $idea))
            ->assertDontSee('data-test-spam-reports-counter', false);

        // Not Admin
        $this->actingAs($user)
            ->get(route('idea.index'))
            ->assertDontSee('data-test-spam-reports-counter', false);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertDontSee('data-test-spam-reports-counter', false);
    }


    /** @test */
    public function test_shows_spam_ideas_filter_when_user_is_admin(){
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        
        $this->actingAs($userAdmin)
            ->get(route('idea.index'))
            ->assertSee('data-test-spam-ideas', false);
    }

    /** @test */
    public function test_does_not_show_spam_ideas_filter_when_user_is_not_admin(){
        $user = User::factory()->create();

        // Guest
        $this->get(route('idea.index'))
            ->assertDontSee('data-test-spam-ideas', false);    

        // Not Admin
        $this->actingAs($user)
            ->get(route('idea.index'))
            ->assertDontSee('data-test-spam-ideas', false);
    }

    /** @test */
    public function test_marking_an_idea_as_spam_works_when_user_is_logged_in(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'title' => 'My Idea',
        ]); 

        Livewire::actingAs($user)
            ->test(MarkIdeaAsSpam::class, [
                'idea'=> $idea,
            ])
            ->call('markIdeaAsSpam')
            ->assertDispatched('idea-was-marked-as-spam');

        $this->assertDatabaseHas('ideas', [
            'Title' => 'My Idea',
            'spam_reports' => 1,
        ]);
    }

    /** @test */
    public function test_marking_an_idea_as_spam_does_not_work_when_user_is_not_logged_in(){
    $idea = Idea::factory()->create([
        'title' => 'My Idea',
    ]); 

    Livewire::test(MarkIdeaAsSpam::class, [
            'idea'=> $idea,
        ])
        ->call('markIdeaAsSpam')
        ->assertStatus(Response::HTTP_FORBIDDEN);
    }


    /** @test */
    public function test_marking_an_idea_as_not_spam_works_when_user_is_admin(){
        $userAdmin = User::factory()->create([
            'email' => 'flor.debock@gmail.com',
        ]);
        $idea = Idea::factory()->create([
            'title' => 'My Idea',
            'spam_reports' => 1,
        ]); 

        Livewire::actingAs($userAdmin)
            ->test(MarkIdeaAsNotSpam::class, [
                'idea'=> $idea,
            ])
            ->call('markIdeaAsNotSpam')
            ->assertDispatched('idea-was-marked-as-not-spam');

        $this->assertDatabaseHas('ideas', [
            'Title' => 'My Idea',
            'spam_reports' => 0,
        ]);
    }

    /** @test */
    public function test_marking_an_idea_as_not_spam_does_not_work_when_user_is_not_admin(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'title' => 'My Idea',
        ]); 


        // Guest
        Livewire::test(MarkIdeaAsNotSpam::class, [
                'idea'=> $idea,
            ])
            ->call('markIdeaAsNotSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);

        // Guest
        Livewire::actingAs($user)
            ->test(MarkIdeaAsNotSpam::class, [
                'idea'=> $idea,
            ])
            ->call('markIdeaAsNotSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
