<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $r)
    {
        Task::create($r->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]));
        return redirect()->route('tasks.index')->with('success', 'Task added!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $r, Task $task)
    {
        $task->update($r->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]));
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task deleted!');
    }

    public function toggleStatus(Task $task)
    {
        $task->update(['status' => $task->status === 'Pending' ? 'Completed' : 'Pending']);
        return back();
    }
}
