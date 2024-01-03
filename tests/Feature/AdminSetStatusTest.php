<?php

namespace Tests\Feature;

use App\Jobs\NotifyAllVoters;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Queue;

use Livewire\Livewire;
use App\Livewire\SetStatus;

use App\Models\User;
use App\Models\Idea;
use Database\Seeders\StatusSeeder;

class AdminSetStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_show_page_contains_set_status_livewire_component_when_user_is_admin(){
        $userAdmin = User::factory()->create(['email' => 'flor.debock@gmail.com']);
        $idea = Idea::factory()->create();
        
        $this->actingAs($userAdmin)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('set-status');
    }     
    
    /** @test */
    public function test_show_page_does_not_contain_set_status_livewire_component_when_user_is_not_admin(){
        $userNonAdmin = User::factory()->create(['email' => 'example@gmail.com']);
        $idea = Idea::factory()->create();
        
        
        // Not Logged In
        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('set-status');
        
        // Not Admin
        $this->actingAs($userNonAdmin)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('set-status');
    }  

    /** @test */
    public function test_set_status_livewire_component_correct_status_selected(){
        $this->seed(StatusSeeder::class);
        $userAdmin = User::factory()->create(['email' => 'flor.debock@gmail.com']);
        $idea = Idea::factory()->create([
            'status_id' => 3,
        ]);
        
        Livewire::actingAs($userAdmin)
            ->test(SetStatus::class, [
                'idea' => $idea,
            ])
            ->assertSet('status', 3);
    }  

    /** @test */
    public function test_can_set_status_correctly(){
        $this->seed(StatusSeeder::class);
        $userAdmin = User::factory()->create(['email' => 'flor.debock@gmail.com']);
        $idea = Idea::factory()->create([
            'status_id' => 3,
        ]);
        
        Livewire::actingAs($userAdmin)
            ->test(SetStatus::class, [
                'idea' => $idea,
            ])
            ->set('status', 4)
            ->call('setStatus')
            ->assertDispatched('status-was-updated');

        $this->assertDatabaseHas('ideas', [
            'id'=> $idea->id,
            'status_id' => 4,
        ]);
    }  

    /** @test */
    public function test_can_set_status_correctly_while_notifying_all_voters(){
        $this->seed(StatusSeeder::class);
        $userAdmin = User::factory()->create(['email' => 'flor.debock@gmail.com']);
        $idea = Idea::factory()->create([
            'status_id' => 3,
        ]);
        
        Queue::fake();

        Queue::assertNothingPushed();

        Livewire::actingAs($userAdmin)
            ->test(SetStatus::class, [
                'idea' => $idea,
            ])
            ->set([
                'status' => 4,
                'notifyAllVoters' => true,
            ])
            ->call('setStatus');
        
        Queue::assertPushed(NotifyAllVoters::class);
    }  
}
