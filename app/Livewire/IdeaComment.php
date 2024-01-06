<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Comment;
use App\Models\Idea;

class IdeaComment extends Component
{
    public $comment;
    public $idea;

    public function mount(Comment $comment, Idea $idea){
        $this->comment = $comment;
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.idea-comment', [
            'comment'=> $this->comment,
        ]);
    }
}
