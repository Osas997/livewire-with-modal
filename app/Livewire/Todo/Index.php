<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On("destroy")]
    public function destroy($id)
    {
        Todo::find($id)->delete();
        $this->dispatch('deleteTodo');
    }

    #[On("editTodo")]
    #[On("closeModal")]
    public function render()
    {
        $todos = Todo::latest()->where('todo', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.todo.index', compact('todos'));
    }
}
