<?php

namespace Tests\Unit\Jobs;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Illuminate\Support\Facades\Mail;

use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\User;
use App\Models\Category;
use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

class NotifyAllVotersTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_sends_an_email_to_all_voters(): void
    {
        $user = User::factory([
            'email' => 'user@gmail.com',
        ])->create();
        $userB = User::factory([
            'email' => 'userB@gmail.com',
        ])->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id'=> $category->id,
            'status_id'=> $status->id,
            'title' => 'My First Idea',
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'user_id'=> $user->id,
            'idea_id'=> $idea->id,
        ]);

        Vote::factory()->create([
            'user_id'=> $userB->id,
            'idea_id'=> $idea->id,
        ]);

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function($mail){
            return $mail->hasTo('user@gmail.com')
            && $mail->envelope()->subject === 'An idea you voted for has a new status';
        });

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function($mail){
            return $mail->hasTo('userB@gmail.com');
        });
    }
}
