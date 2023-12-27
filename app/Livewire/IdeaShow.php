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
        'statusWasUpdated'
        ];

    public function mount(Idea $idea, $votesCount, $hasVoted){
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $hasVoted;
    }

    public function statusWasUpdated(){
        $this->idea->refresh();
    }
    
    public function render()
    {
        return view('livewire.idea-show');
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
