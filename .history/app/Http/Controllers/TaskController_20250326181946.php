<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //list of all tasks
        $tasks = Task::all();//static method all() to get all records related to tasks from the database
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vliadate the request and create a new task
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'completed' => 'boolean',
        ]);
        Task::create($data);//$request->all()

        return to_route('tasks.index')->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //validate the request and update the task
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'completed' => 'boolean',
        ]);
        $task->update($data);   
        return to_route('tasks.show',$task)->with('success', 'Task updated successfully');
        //return to_route('tasks.index')->with('success', 'Task updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return to_route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function toggleStatus(Task $task)
    {
        //task->completed = !$task->completed;
        //task->save();
        $task->update(['completed' => !$task->completed]);
        return to_route('tasks.index')->with('success', 'Task status updated successfully');
    }
}
