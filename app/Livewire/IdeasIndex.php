<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\Status;
use App\Models\Idea;
use App\Models\Vote;

use Livewire\WithPagination;


class IdeasIndex extends Component
{
    use WithPagination;
    public $status;
    public $category;

    protected $queryString = [
        'status' => ['except', 'All'],
        'category',
    ];

    protected $listeners = [
        'queryStringUpdatedStatus',
    ];

    public function mount(){
        $this->status = request()->status ?? 'All';
        $this->category = request()->category ?? 'All Categories';
    }

    public function render()
    {   
        $statuses = Status::All()
                        ->pluck('id', 'name');
        $categories = Category::All();

        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($this->status && $this->status !== 'All', function ($query) use ($statuses){
                    return $query->where('status_id', $statuses[$this->status]);
                })
                ->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories){
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->addSelect(['voted_by_user' => Vote::Select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('id','desc')
                ->simplePaginate(),
            'categories' => $categories,
        ]);
    }

    public function QueryStringUpdatedStatus($status){
        $this->status = $status;
        $this->resetPage();
    }
}
