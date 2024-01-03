<?php

namespace App\Livewire;

use App\Jobs\NotifyAllVoters;
use Illuminate\Http\Response;
use Livewire\Component;

use App\Models\Idea;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyAllVoters;

    public function mount(Idea $idea){
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
        $this->notifyAllVoters = false;
    }

    public function setStatus(){
        if (!auth()->check() || !auth()->user()->isAdmin()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if($this->notifyAllVoters){
            NotifyAllVoters::dispatch($this->idea);
        }

        $this->dispatch('status-was-updated');
    }
    public function render()
    {
        return view('livewire.set-status');
    }
}
