<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaStatusUpdatedMailable;

use Illuminate\Http\Response;
use Livewire\Component;

use App\Models\Idea;
use App\Models\User;

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
            $this->notifyAllVoters();
        }

        $this->dispatch('statusWasUpdated');
    }
    public function render()
    {
        return view('livewire.set-status');
    }

    public function notifyAllVoters(){
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(100, function($voters) {
                foreach($voters as $user){
                    Mail::to($user)
                        ->queue(new IdeaStatusUpdatedMailable($this->idea));
                }
            });
    }
}
