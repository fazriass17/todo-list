<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h4 class="mb-3">Edit Tugas</h4>
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="/" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-check"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</body>

</html>