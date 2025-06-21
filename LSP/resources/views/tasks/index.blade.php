<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple To-Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    body {
        background: #FDF7F3;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .todo-card {
        background: white;
        border-radius: 30px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .form-control:focus {
        box-shadow: none;
    }
    </style>
</head>

<body>
    <div class="todo-card">
        <h4 class="text-center mb-4" style="color:rgb(0, 0, 0); font-weight: bold;">
            📌 My To-Do List
        </h4>

        <!-- Form Tambah Task -->
        <form method="POST" action="/tasks" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control rounded-0 rounded-start"
                    placeholder="Tambahkan tugas..." required>
                <button type="submit" class="btn btn-dark rounded-0 rounded-end">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </form>

        <!-- Belum Selesai -->
        <h6 class="fw-bold">Belum Selesai</h6>
        @forelse($tasks_todo as $task)
        <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 mb-2">
            <span>{{ $task->title }}</span>
            <div class="d-flex align-items-center gap-2">
                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm"
                    style="color: black; background: none; border: none; padding: 0;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="/tasks/{{ $task->id }}/toggle" method="POST" style="margin: 0;">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-sm" style="color: black; background: none; border: none; padding: 0;">
                        <i class="fa-regular fa-square"></i> <!-- Kotak kosong icon hitam -->
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-muted small">Tidak ada tugas.</p>
        @endforelse

        <!-- Sudah Selesai -->
        <h6 class="fw-bold mt-4">Sudah Selesai</h6>
        @forelse($tasks_done as $task)
        <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 mb-2">
            <span>{{ $task->title }}</span>
            <div class="d-flex align-items-center gap-2">
                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm"
                    style="color: black; background: none; border: none; padding: 0;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="/tasks/{{ $task->id }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm" style="color: black; background: none; border: none; padding: 0;">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-muted small">Belum ada yang selesai.</p>
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>