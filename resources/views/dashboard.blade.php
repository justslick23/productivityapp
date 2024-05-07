<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    @include('nav.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
    
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     @include('nav.sidebar')
      <!-- partial -->
      <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dummy data with Star Admin layout -->
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Clients</h4>
                        <p class="card-description">100</p> <!-- Dummy number for total clients -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Projects</h4>
                        <p class="card-description">50</p> <!-- Dummy number for total projects -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Tasks Completed</h4>
                        <p class="card-description">250</p> <!-- Dummy number for total tasks completed -->
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <h3>Outstanding Tasks</h3>
            <br><br>
        <div class="table-responsive">
    <table class="table" style="background-color: white;">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Project</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Task 1</td>
                <td>Project A</td>
                <td>2024-05-15</td>
                <td><span class="badge badge-primary">Pending</span></td>
            </tr>
            <tr>
                <td>Task 2</td>
                <td>Project B</td>
                <td>2024-05-17</td>
                <td><span class="badge badge-warning">In Progress</span></td>
            </tr>
            <tr>
                <td>Task 3</td>
                <td>Project C</td>
                <td>2024-05-20</td>
                <td><span class="badge badge-success">Completed</span></td>
            </tr>
            <!-- Add more rows for other tasks -->
        </tbody>
    </table>
</div>

        </div>
        <!-- End of dummy data -->
    </div>
</div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- Endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- Injected JS -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- End injected JS -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

@endsection
  
