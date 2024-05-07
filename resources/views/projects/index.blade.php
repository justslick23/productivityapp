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
                        <h4 class="card-title">Projects Table</h4>
                        <!-- Add Client Button -->
                        <div>
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
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
                                        <th>ID</th>
                                        <th>Project Name</th>
                                        <th>Project Type</th>
                                        <th>Client</th>
                                        <th>Project Start Date</th>
                                        <th>Project  End Date</th>
                                        <th>Action</th> <!-- New column for action buttons -->


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->project_type }}</td>

                                            <td>{{ $project->client->name}}</td>
                                            <td>{{ $project->start_date}}</td>
                                            <td>{{ $project->end_date}}</td>
                                            <td>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

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
