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
}
