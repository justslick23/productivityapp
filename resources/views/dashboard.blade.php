<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text" id="greeting"></h1>
        <h3 class="welcome-sub-text">Your performance summary this week</h3>
    </li>
</ul>

       
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
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
<script>  // Function to display the appropriate greeting message based on the time of the day
    function displayGreeting() {
        var date = new Date();
        var hour = date.getHours();
        var greetingElement = document.getElementById('greeting');
        var greetingMessage;

        if (hour >= 0 && hour < 12) {
            greetingMessage = 'Good Morning';
        } else if (hour >= 12 && hour < 18) {
            greetingMessage = 'Good Afternoon';
        } else {
            greetingMessage = 'Good Evening';
        }

        // Replace 'John Doe' with the actual user's name
        var userName = '{{ Auth::user()->name }}';
        greetingElement.innerHTML = `${greetingMessage}, <span class="text-black fw-bold">${userName}</span>`;
    }

    // Call the function to display the greeting message
    displayGreeting();
</script>
@endsection
  
