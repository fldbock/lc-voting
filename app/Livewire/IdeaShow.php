<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Idea;
use App\Models\Vote;

class IdeaShow extends Component
{
    
    public $idea;
    public $votesCount;
    public $hasVoted;

    protected $listeners = [
        'status-was-updated' => '$refresh',
        'idea-was-updated' => '$refresh',
        'idea-was-marked-as-spam'=> '$refresh',
        'idea-was-marked-as-not-spam'=> '$refresh',
        ];

    public function mount(Idea $idea, $votesCount, $hasVoted){
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $hasVoted;
    }
    
    public function render()
    {
        return view('livewire.idea-show', [
            'comment_count' => $this->idea->comments->count(),
        ]);
    }

    public function vote(){
        if (!auth()->check()) {//guest
            return redirect()->route('login');
        }
        
        $this->idea->toggleVote(auth()->user());

        $this->hasVoted ? $this->votesCount = $this->votesCount -1: $this->votesCount = $this->votesCount +1;

        $this->hasVoted = !$this->hasVoted;        
    }
}
