<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        @include('nav.navbar')

        @include('nav.sidebar')

        <div class="container">
            <div class="row">
                <div class="col-lg-12 main-content">
                    <div class="card">
                        <div class="card-header">{{ __('Create New Task') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('tasks.store') }}">
                                @csrf

                                <!-- Task Name -->
                                <div class="form-group">
                                    <label for="name">Task Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Task Description -->
                                <div class="form-group">
                                    <label for="description">Task Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Client -->
                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                               <!-- Display projects based on the selected client -->
                              <!-- Display projects based on the selected client -->
                            <div class="form-group" id="project_group">
                                <label for="project_id">Project</label>
                                <select class="form-control @error('project_id') is-invalid @enderror" id="project_id" name="project_id" required>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" class="project-option client-{{ $project->client_id }}" >{{ $project->name }} ( {{$project->client->name}} )</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                                <!-- Start Date -->
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Create Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $('#client_id').change(function () {
        var clientId = $(this).val();
        $('.project-option').hide().prop('selected', false);
        $('.client-' + clientId).show().first().prop('selected', true); // Show the first project for the selected client
    });
</script>
@endpush