<?php

namespace App\Livewire;

use Illuminate\HTTP\Response;

use Livewire\Component;

use App\Models\Idea;
class MarkIdeaAsSpam extends Component
{
    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }

    public function markIdeaAsSpam(){
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports++;
        $this->idea->save();

        $this->dispatch('ideaWasMarkedAsSpam');
    }
}
