<div>
    <div class="row justify-content-between">
        <div class="col-6 mb-2">
            <input type="text" placeholder="Cari..." wire:model.live="search" class="form-control">
        </div>
        @if (count($selectedDeleteId) > 0)
        <div class="col-6 mb-2 text-end">
            <button class="btn btn-danger" onclick="confirmBulkDelete()">Delete</button>
        </div>
    </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col"><input type="checkbox" wire:model.live="selectAll"></th>
                <th scope="col">Todo</th>
                <th scope="col">Dibuat</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr wire:key="todo-{{ $todo->id }}">
                <th scope="row">{{ $loop->iteration + $todos->firstItem() - 1 }}</th>
                <th scope="row"><input type="checkbox" wire:model.live="selectedDeleteId" value="{{ $todo->id }}"></th>
                <td>{{ $todo->todo }}</td>
                <td>{{ $todo->created_at->timezone('Asia/Jakarta')->format('H:i') }}</td>
                <td class="text-center d-flex justify-content-center gap-2">
                    <livewire:todo.edit id="{{ $todo->id }}" key="{{ 'edit' . uniqid() .$todo->id }}" wire:ignore>
                        <button onclick="confirmDelete({{ $todo->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $todos->links() }}
    </div>
</div>