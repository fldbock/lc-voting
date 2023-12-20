<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Route;

use App\Models\Status;
class StatusFilters extends Component
{
    public $status = 'All';
    public $statusCount;

    protected $queryString = [
        'status',
    ];

    public $currentRouteName;
    
    public function mount(){      
        $this->statusCount = Status::getCount();

        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
            $this->queryString = [];
            $this->currentRouteName = Route::currentRouteName();
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    public function setStatus($status){
        $this->status = $status;
        if ($this->currentRouteName === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status,
            ]);
        }
    }
}
