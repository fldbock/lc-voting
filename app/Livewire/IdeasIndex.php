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

    public $filter;

    protected $queryString = [
        'status' => ['except', 'All'],
        'category',
        'filter',
    ];

    protected $listeners = [
        'queryStringUpdatedStatus',
    ];

    public function mount(){
        $this->status = request()->status ?? 'All';
        $this->category = request()->category ?? 'All Categories';
        $this->filter = request()->filter ?? 'No Filter';
    }

    public function updatingCategory(){
        $this->resetPage();
    }

    public function updatingFilter(){
        $this->resetPage();
    }
    
    public function updatedFilter($newFilter){
        if ($this->filter === 'My Ideas' && !auth()->check()){
            return redirect()->route('login');
        }        
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
                ->when($this->filter === 'Top Voted', function ($query) {
                    return $query->orderByDesc('votes_count');
                })
                ->when($this->filter === 'My Ideas', function ($query) {                 
                    return $query->where('user_id', auth()->user()->id);
                })
                ->addSelect(['voted_by_user' => Vote::Select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderByDesc('id')
                ->simplePaginate(),
            'categories' => $categories,
        ]);
    }

    public function QueryStringUpdatedStatus($status){
        $this->status = $status;
        $this->resetPage();
    }
}
