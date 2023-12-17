<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Idea;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;

    public function mount(Idea $idea){
        $this->idea = $idea;
        $this->votesCount = $idea->votes_count;
    }
    public function render()
    {
        return view('livewire.idea-index');
    }
}
