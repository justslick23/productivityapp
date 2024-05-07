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
                            <form method="POST" action="{{ route('clients.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Client Contact Person') }}</label>

                                    <div class="col-md-6">
                                        <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create Client') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
