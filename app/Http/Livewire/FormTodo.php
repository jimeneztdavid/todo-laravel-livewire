<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormTodo extends Component
{
    public $title;
    public $content;
    public $message;

    public function storeTodo()
    {
        $this->validate([
            'content' => 'required|min:5|max:100'
        ]);

        Todo::create([
            'user_id' => Auth::user()->id,
            'content' => $this->content
        ]);

        $this->reset('content');
        $this->message = 'Todo stored successfully';
        $this->emit('todoStored');
    }

    public function closeMessage()
    {
        $this->reset('message');
    }
    
    public function render()
    {
        return view('livewire.form-todo');
    }
}
