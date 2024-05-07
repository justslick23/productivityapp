<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\Client;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        // Retrieve dummy client data (you can use factories or seeders)
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    
    public function create()
    {
        $clients = Client::all();
        $projects = Project::with('client')->get(); // Include client information
        return view('tasks.create', compact('clients', 'projects'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'project_id' => 'required|exists:projects,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'status' => 'required|string|in:In Progress,Complete',
    ]);

    // Create a new task instance
    $task = new Task();
    $task->name = $validatedData['name'];
    $task->description = $validatedData['description'];
    $task->client_id = $validatedData['client_id'];
    $task->project_id = $validatedData['project_id'];
    $task->start_date = $validatedData['start_date'];
    $task->end_date = $validatedData['end_date'];
    $task->status = $validatedData['status'];

    // Save the task to the database
    $task->save();

    // Redirect back with a success message
    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
}

public function edit(Task $task)
{
    $clients = Client::all();
    $projects = Project::with('client')->get(); // Include client information
    return view('tasks.edit', compact('task', 'clients', 'projects'));
}

/**
 * Update the specified task in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Task  $task
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, Task $task)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'project_id' => 'required|exists:projects,id',
        'start_date' => 'required|date',
        'status' => 'required|string|in:In Progress,Complete',
    ]);

    if ($validatedData['status'] === 'Complete') {
        $validatedData['end_date'] = Carbon::now();
    }

    $task->update($validatedData);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}

}
