<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Idea;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea, $votesCount, $hasVoted){
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $hasVoted;
    }
    public function render()
    {
        return view('livewire.idea-index');
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
