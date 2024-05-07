<!-- resources/views/clients/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        @include('nav.navbar')

        @include('nav.sidebar')
        <!-- /Sidebar -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Tasks Table</h4>
                        <!-- Add Client Button -->
                        <div>
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                        </div>

                        <div>
    <a href="{{ route('reports.generate', ['type' => 'weekly']) }}" class="btn btn-primary mr-2">Weekly Report</a>
    <a href="{{ route('reports.generate', ['type' => 'monthly']) }}" class="btn btn-primary">Monthly Report</a>
</div>


                     
                        <!-- End Add Client Button -->
                    </div>
                    @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Project Name</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Task Start Date</th>
                                        <th>Task End Date</th>
                                        <th>Actions</th> <!-- New Column for Actions -->


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->project->name }}</td>
                                            <td>{{ $task->client->name }}</td>
                                            <td>   <span class="badge {{ $task->status === 'In Progress' ? 'badge-info' : 'badge-success' }}">
        {{ $task->status }}
    </span></td>
                                            <td>{{ \Carbon\Carbon::parse($task->start_date)->format('Y-m-d H:i:s') }}</td>

                                            @if($task->status === "In Progress")
                                            <td>{{ \Carbon\Carbon::parse($task->end_date)->format('Y-m-d H:i:s') }}</td>
                                            @elseif ($task->status == "Complete")
                                            <td>{{ \Carbon\Carbon::parse($task->updated_at)->format('Y-m-d H:i:s') }}</td>
                                            @endif

                                            <td>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this task?')">
                                                        <i class="mdi mdi-delete"></i> 
                                                    </button>
                                                </form>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-xs">
                                                    <i class="mdi mdi-pencil"></i> 
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
