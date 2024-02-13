<div>
    {{-- button --}}
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $todoId }}">
        Edit
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editModal{{ $todoId }}" tabindex="-1"
        aria-labelledby="editModal{{ $todoId }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModal{{ $todoId }}Label">Edit Todo {{ $todoId }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <label class="form-label" for="todo{{ $todoId }}">To Do</label>
                        <input wire:model='todo' id="todo{{ $todoId }}" type="text" class="form-control">
                    </div>
                    @error('todo')
                    <p class="text-center text-danger mt-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save" wire:click='update' class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>