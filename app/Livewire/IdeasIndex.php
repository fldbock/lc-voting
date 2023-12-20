<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

use Livewire\WithPagination;

class IdeasIndex extends Component
{
    //use WithPagination;
    /**/
    
    public function render()
    {   
        $statuses = Status::All()
                        ->pluck('id', 'name');
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user', 'category', 'status')
            ->when(request()->status && request()->status !== 'All', function ($query) use ($statuses){
                return $query->where('status_id', $statuses[request()->status]);
            })
            ->addSelect(['voted_by_user' => Vote::Select('id')
                ->where('user_id', auth()->id())
                ->whereColumn('idea_id', 'ideas.id')
            ])
            ->withCount('votes')
            ->orderBy('id','desc')
            ->simplePaginate(),
        ]);
    }
}