<?php

namespace App\Livewire;

use illuminate\Http\Response;
use Livewire\Component;

use App\Models\Idea;

class MarkIdeaAsNotSpam extends Component
{
    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.mark-idea-as-not-spam');
    }
    public function markIdeaAsNotSpam(){
        if(auth()->guest() || !auth()->user()->isAdmin()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports = 0;
        $this->idea->save();

        $this->dispatch('idea-was-marked-as-not-spam');
        $this->dispatch('notification-success-open', message:'Idea was succesfully marked as NOT spam!');
    }
}
