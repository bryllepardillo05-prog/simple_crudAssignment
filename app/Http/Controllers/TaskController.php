<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // READ & FORM
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks', compact('tasks'));
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create(['title' => $request->title]);
        return back();
    }

    // UPDATE
    public function update(Request $request, Task $task)
    {
        $request->validate(['title' => 'required']);
        $task->update(['title' => $request->title]);
        return back();
    }

    // DELETE
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
