<?php

namespace App\Livewire;

use Illuminate\Http\Response;

use Livewire\Component;

use App\Models\Idea;
use App\Models\Comment;

class CreateComment extends Component
{
    public $idea;

    public $body;

    protected $rules = [
        'body' => 'required|min:4',
    ];
    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.create-comment');
    }

    public function createComment(){
        if (auth()->guest()){
            abort(Response::HTTP_FORBIDDEN); 
        }

        $this->validate();
        
        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'idea_id' => $this->idea->id,
            'body' => $this->body,
        ]);
        
        $this->reset('body');
        $this->dispatch('comment-was-created');
        $this->dispatch('notification-success-open', message:'Comment was added successfully.');
    }
}
