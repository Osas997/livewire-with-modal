<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'To Do' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">ToDo List</h5>
                    </div>
                    <div class="card-body">
                        <div class="py-2">
                            <livewire:todo.create />
                        </div>
                        <hr>
                        <div class="py-2">
                            <livewire:todo.index />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        window.addEventListener('closeModal', () => {
        $('#createModal').modal('hide');
    });
    
    window.addEventListener('closeModalUpdate', event => {
        idModal = "#editModal" + event.detail;
        $(idModal).modal('hide');
    });

    const confirmDelete = (id) => {
        Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            }).then((result) => {
                Livewire.dispatch('destroy', [id]);
            });
        }
    });
    }
    </script>

</body>

</html>