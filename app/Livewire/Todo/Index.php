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

    public $selectAll = false;

    public $selectedDeleteId = [];

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedDeleteId = Todo::pluck('id')->toArray();
        } else {
            $this->selectedDeleteId = [];
        }
    }

    #[On("bulkDelete")]
    public function bulkDelete()
    {
        if (count($this->selectedDeleteId) > 0) {
            Todo::destroy($this->selectedDeleteId);
            $this->dispatch('deleteTodo');
        }

        $this->reset('selectedDeleteId');
        $this->resetPage();
    }

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
