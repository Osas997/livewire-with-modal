<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Edit extends Component
{

    #[Rule('required')]
    public $todo;

    public $todoId;

    public function mount($id)
    {
        $todo = Todo::find($id);
        $this->todoId = $todo->id;
        $this->todo = $todo->todo;
    }

    public function update()
    {

        $todo = $this->validate();

        Todo::find($this->todoId)->update($todo);

        $this->dispatch('closeModalUpdate', $this->todoId);

        $this->dispatch('editTodo');
    }


    public function render()
    {
        return view('livewire.todo.edit');
    }
}
