<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\Client;


class HomeController extends Controller
{
    public function index () {
        $tasks = Task::all();
        $projects = Project::all();
        $clients = Client::all();
        $totalTasksCompleted = Task::where('status', 'Complete')->count();

        $dates = [];
$completedTasks = [];
$inProgressTasks = [];

// Loop through tasks to aggregate data
foreach ($tasks as $task) {
    $date = $task->created_at->toDateString(); // Assuming tasks have a 'created_at' field
    if (!in_array($date, $dates)) {
        $dates[] = $date;
        $completedTasks[$date] = 0;
        $inProgressTasks[$date] = 0;
    }
    if ($task->status === 'Completed') {
        $completedTasks[$date]++;
    } elseif ($task->status === 'In Progress') {
        $inProgressTasks[$date]++;
    }
}

// Format data for use in the chart
$data = [
    'labels' => $dates,
    'datasets' => [
        [
            'label' => 'Tasks Completed',
            'data' => array_values($completedTasks),
            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
            'borderColor' => 'rgba(75, 192, 192, 1)',
            'borderWidth' => 1
        ],
        [
            'label' => 'Tasks In Progress',
            'data' => array_values($inProgressTasks),
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgba(255, 99, 132, 1)',
            'borderWidth' => 1
        ]
    ]
];

        return view('dashboard', compact('tasks', 'projects', 'clients', 'totalTasksCompleted', 'data'));
    
    }
}
