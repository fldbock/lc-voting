<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;
    /**/
    public function render()
    {
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user', 'category', 'status')
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
