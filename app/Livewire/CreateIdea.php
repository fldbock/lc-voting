<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Http\Response;

use App\Models\Idea;
use App\Models\Category;
use App\Models\Vote;

class CreateIdea extends Component
{
 
    public $title;
    public $category = 1;
    public $description; 

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|exists:App\Models\Category,id',
        'description'=> 'required|min:4',
    ];
 
    public function createIdea(){
        if (auth()->guest()){
            abort(Response::HTTP_FORBIDDEN); 
        }
         
        $this->validate();
            
        $idea = Idea::create([
            'user_id' => auth()->user()->id,
            'category_id' => $this->category,
            'status_id' => 1, //Open status_id
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $idea->toggleVote(auth()->user());

        session()->flash('success','Idea was added successfully.');
        $this->reset();

        return redirect()->route('idea.index');      
    }
    public function render()
    {   
        return view('livewire.create-idea', [
            'categories' => Category::all(),
        ]);
    }
}
