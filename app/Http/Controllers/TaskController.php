<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('user', 'executors')->get();
        $users = User::all();
        
        return view('task.index', compact('tasks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user()->associate($request->user_id);
        $task->save();
        $task->executors()->attach($request->executors);

        return redirect('task');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::with('user', 'executors')->find($id);
        $users = User::all();

        return view('task.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user()->associate($request->user_id);
        $task->save();
        $task->executors()->sync($request->executors);

        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('task');
    }
}
