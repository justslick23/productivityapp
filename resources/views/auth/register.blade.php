<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
            @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{asset ('/images/logo.png')}}" style = "width: 50%" alt="logo">
                </div>
                <h4>New here?</h4>
                <h6 class="fw-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method = "POST" action="{{ route('createUser') }}">
                    @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name = "name" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"  name = "email" placeholder="Email">
                  </div>
             
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"  name = "password" placeholder="Password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                  <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 fw-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('/js/off-canvas.js') }}"></script>
<script src="{{ asset('/js/template.js') }}"></script>
<script src="{{ asset('/js/settings.js') }}"></script>
<script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('/js/todolist.js') }}"></script>
<!-- endinject -->

@endsection
