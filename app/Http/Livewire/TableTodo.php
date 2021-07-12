<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TableTodo extends Component
{
    use WithPagination;

    public $search;
    public $rows = 5;
    public $order;
    public $sortAsc = false;
    
    protected $listeners = [
        'todoStored' => 'render'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
    }

    public function render()
    {
        return view('livewire.table-todo', [
            'todos' => $this->todos = Todo::with('user')->where('content', 'like', '%'.$this->search.'%')
                                        ->orWhere('created_at', 'like', '%' . $this->search . '%')
                                        ->orWhereHas('user', function($query) {
                                            return $query->where('name', 'like', '%' . $this->search . '%');
                                        })
                                        ->when($this->order, function($query) {
                                            $query->orderBy($this->order, $this->sortAsc ? 'asc' : 'desc');
                                        })
                                        ->paginate($this->rows)
        ]);
    }
}
