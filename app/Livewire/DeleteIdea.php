<?php

namespace App\Livewire;

use Illuminate\Http\Response;

use Livewire\Component;

use App\Models\Idea;

class DeleteIdea extends Component
{
    public $idea;


    public function mount(Idea $idea){
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.delete-idea');
    }

    public function deleteIdea(){
        if(auth()->guest() || auth()->user()->cannot('delete', $this->idea)){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->delete();

        return redirect()->route('idea.index');
    }
}
