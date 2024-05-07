<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        // Retrieve dummy client data (you can use factories or seeders)
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('projects.create', compact('clients'));
    }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'project_type' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);
    $user = Auth::user();


    // Create a new project instance
    $project = new Project();

    // Assign values from the form
    $project->name = $validatedData['name'];
    $project->project_type = $validatedData['project_type'];
    $project->client_id = $validatedData['client_id'];
    $project->start_date = $validatedData['start_date'];
    $project->end_date = $validatedData['end_date'];
    $project->user_id = $user->id;

    // Save the project
    $project->save();

    // Redirect to a success page or display a success message
    return redirect()->route('projects.index')->with('success', 'Project created successfully.');

}

public function destroy(Project $project)
{
    $project->delete();
    return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
}
}
