<!-- resources/views/clients/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        @include('nav.navbar')

@include('nav.sidebar')

        <div class="container">
            <div class="row">
                <!-- Sidebar -->
              

                <div class="col-lg-12 col-lg-12 main-content">
                    <div class="card">
                        <div class="card-header">{{ __('Create New Client') }}</div>

                        <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
    @csrf

    <!-- Project Name -->
    <div class="form-group">
        <label for="name">Project Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Project Type -->
    <div class="form-group">
        <label for="project_type">Project Type</label>
        <select class="form-control @error('project_type') is-invalid @enderror" id="project_type" name="project_type" required>
            <option value="Active Project">Active Project</option>
            <option value="Support Project">Support Project</option>
            <option value="Other">Other</option>
        </select>
        @error('project_type')
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

    <!-- Start Date -->
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" >
        @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- End Date -->
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" >
        @error('end_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
