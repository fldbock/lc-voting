<?php

namespace App\Livewire;

use Illuminate\Http\Response;
use Livewire\Component;

use App\Models\Category;
use App\Models\Idea;

class EditIdea extends Component
{
    public $idea;
    public $title;
    public $category;
    public $description;    

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|exists:App\Models\Category,id',
        'description'=> 'required|min:4',
    ];

    public function mount(Idea $idea){
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }
    public function render()
    {
        return view('livewire.edit-idea', [
            'categories' => Category::all(),
        ]);
    }

    public function updateIdea(){
        if(auth()->guest() || auth()->user()->cannot('update', $this->idea)){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->idea->update([
            'title'=> $this->title,
            'category_id' => $this->category,
            'description'=> $this->description,
        ]);

        $this->dispatch('idea-was-updated');
        $this->dispatch('notification-success-open', message:'Idea was succesfully updated!');
    }
}
