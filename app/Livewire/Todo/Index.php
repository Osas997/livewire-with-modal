<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
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
        $todos = Todo::latest()->get();
        return view('livewire.todo.index', compact('todos'));
    }
}
