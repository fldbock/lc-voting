<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Route;

use App\Models\Status;
class StatusFilters extends Component
{
    public $status;
    public $statusCount;
    public $currentRouteName;
    
    public function mount(){      
        $this->statusCount = Status::getCount();
        $this->status= request()->status ?? 'All';

        if (Route::currentRouteName() === 'idea.show') {
            $this->currentRouteName = Route::currentRouteName();
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    public function setStatus($status){
        $this->status = $status;
        $this->dispatch('queryStringUpdatedStatus', $status);
        if ($this->currentRouteName === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status,
            ]);
        }
    }
}
