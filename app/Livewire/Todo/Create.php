<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

    #[Rule('required')]
    public $todo;

    public function store()
    {

        $todo = $this->validate();

        Todo::create($todo);

        $this->reset();

        $this->dispatch('closeModal');

        session()->flash('message', "Berhasil Create ToDo");
    }

    #[On("editTodo")]
    public function editTodo()
    {
        session()->flash('message', "Berhasil Edit ToDo");
    }

    #[On("deleteTodo")]
    public function deleteTodo()
    {
        session()->flash('message', "Berhasil Hapus ToDo");
    }

    public function render()
    {
        return view('livewire.todo.create');
    }
}
