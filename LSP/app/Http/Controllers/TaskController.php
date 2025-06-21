<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks_todo = Task::where('is_done', false)->get();
        $tasks_done = Task::where('is_done', true)->get();

        return view('tasks.index', compact('tasks_todo', 'tasks_done'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'is_done' => false
        ]);

        return redirect()->back();
    }

    public function toggle(Task $task)
    {
        $task->update([
            'is_done' => !$task->is_done
        ]);

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    // Tambahan fitur edit/rename
   public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255'
    ]);

    $task->update([
        'title' => $request->title
    ]);

    return redirect('/')->with('success', 'Tugas berhasil diubah.');
}
}