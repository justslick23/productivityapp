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
                        <h4 class="card-title">Client Table</h4>
                        <!-- Add Client Button -->
                        <div>
                            <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
                        </div>

                     
                        <!-- End Add Client Button -->
                    </div>
                    @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Person</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->contact_person }}</td>
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
