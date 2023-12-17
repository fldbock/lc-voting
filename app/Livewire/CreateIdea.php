<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Http\Response;

use App\Models\Idea;
use App\Models\Category;

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
        if (auth()->check()){
            $this->validate();
            
            Idea::create([
                'user_id' => auth()->user()->id,
                'category_id' => $this->category,
                'status_id' => 1, //Open status_id
                'title' => $this->title,
                'description' => $this->description,
            ]);

            session()->flash('success_message','Idea was added successfully.');
            $this->reset();

            return redirect()->route('idea.index');
        }
        abort(Response::HTTP_FORBIDDEN);        
    }
    public function render()
    {   
        return view('livewire.create-idea', [
            'categories' => Category::all(),
        ]);
    }
}
