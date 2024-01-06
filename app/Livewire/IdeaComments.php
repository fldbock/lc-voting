<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Idea;
use App\Models\Comment;
class IdeaComments extends Component
{
    public $idea;

    protected $listeners = [
        'comment-was-created'=> '$refresh',
    ];
    public function mount(Idea $idea){
        $this->idea = $idea;
    }
    public function render()
    {   
        return view('livewire.idea-comments', [
            'comments' => Comment::with('user')
            ->where(function($query){
                $query->where('idea_id', $this->idea->id);
            })
            ->get(),
        ]);
    }
}
