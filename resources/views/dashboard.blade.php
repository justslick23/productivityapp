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
                        <p class="text-small mb-2">Total Clients</p>
                        <h4 class="mb-0 fw-bold">{{$clients->count()}}</h4> <!-- Dummy number for total clients -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="text-small mb-2">Total Projects</p>
                        <h4 class="mb-0 fw-bold">{{$projects->count()}}</h4> <!-- Dummy number for total projects -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="text-small mb-2" >Total Tasks Completed</p>
                        <h4 class="mb-0 fw-bold">{{$totalTasksCompleted}}</h4> <!-- Dummy number for total tasks completed -->
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
                <th>Client</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
        @if ($task->status === 'In Progress')
                                            <tr>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ $task->project->name }}</td>
                                                <td>{{ $task->client->name }}</td>

                                                <td>{{ $task->end_date }}</td>
                                                <td><span class="badge badge-primary">{{ $task->status }}</span></td>
                                    
                                            </tr>
                                        @endif

            @endforeach
            <!-- Add more rows for other tasks -->
        </tbody>
    </table>
</div>

        </div>



        <br>

        <br>

        <div class="row">
        <h3>Task Chart</h3>
        <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="fromDate">From:</label>
            <input type="date" class="form-control" id="fromDate">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="toDate">To:</label>
            <input type="date" class="form-control" id="toDate">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">&nbsp;</label>
            <button type="button" class="btn btn-primary btn-block" onclick="updateChart()">Update Chart</button>
        </div>
    </div>
</div>


        <canvas id="tasksChart" width="800" height="300"></canvas>

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
<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Bootstrap Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    // Function to calculate date range for the past week
    function getLastWeekDateRange() {
        const today = new Date();
        const lastWeek = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000); // 7 days ago
        return { fromDate: lastWeek.toISOString(), toDate: today.toISOString() };
    }

    // Function to generate an array of dates for the past week
    function generateDatesArray() {
        const dateRange = getLastWeekDateRange();
        const fromDate = new Date(dateRange.fromDate);
        const toDate = new Date(dateRange.toDate);
        const datesArray = [];

        for (let date = fromDate; date <= toDate; date.setDate(date.getDate() + 1)) {
            datesArray.push(date.toISOString().split('T')[0]); // Extract date part only
        }

        return datesArray;
    }

    function initializeChart(tasks) {
    // Generate array of dates for the past 7 days
    const dates = [];
    const currentDate = new Date();

    for (let i = 6; i >= 0; i--) {
        const date = new Date(currentDate);
        date.setDate(date.getDate() - i);
        dates.push(date.toISOString().split('T')[0]); // Extract date part only
    }

    // Initialize task counts for each date
    const taskCounts = {};
    const completedCounts = {};

    tasks.forEach(task => {
        const date = task.start_date.split(' ')[0]; // Extract date part only

        if (!taskCounts[date]) {
            taskCounts[date] = 0;
            completedCounts[date] = 0;
        }

        taskCounts[date]++;
        if (task.status === 'Complete') {
            completedCounts[date]++;
        }
    });

    // Fill in zeros for dates without tasks
    dates.forEach(date => {
        if (!taskCounts[date]) {
            taskCounts[date] = 0;
        }
        if (!completedCounts[date]) {
            completedCounts[date] = 0;
        }
    });

    // Sort dates
    dates.sort();

    // Initialize arrays for chart data
    const tasksData = [];
    const completedData = [];

    // Fill chart data arrays
    dates.forEach(date => {
        tasksData.push(taskCounts[date]); // Push number of tasks for each date
        completedData.push(completedCounts[date]); // Push number of completed tasks for each date
    });

    // Chart configuration
    const data = {
        labels: dates,
        datasets: [{
            label: 'Tasks',
            data: tasksData,
            borderColor: 'rgba(255, 99, 132, 1)',
            tension: 0.1
        }, {
            label: 'Completed Tasks',
            data: completedData,
            borderColor: 'rgba(54, 162, 235, 1)',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        displayFormats: {
                            day: 'MMM DD' // Format for displaying dates on x-axis
                        }
                    },
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Tasks'
                    }
                }
            }
        }
    };

    // Initialize the chart
    var myChart = new Chart(
        document.getElementById('tasksChart'),
        config
    );
}


    // Initialize the chart with tasks data
    $(document).ready(function() {
        initializeChart(@json($tasks));
    });

        // Function to update the chart based on selected dates
        function updateChart() {
        // Get the selected dates from the input fields
        const fromDate = document.getElementById('fromDate').value;
        const toDate = document.getElementById('toDate').value;

        // Make an AJAX request to fetch data for the selected date range
        $.ajax({
            url: '/fetch-chart-data',
            method: 'GET',
            data: {
                fromDate: fromDate,
                toDate: toDate
            },
            success: function(response) {
                // Update the chart with new data
                updateChartData(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching chart data:', error);
            }
        });
    }

    // Function to update chart data
    function updateChartData(data) {
        // Assuming data is in the format: { labels: [], datasets: [...] }
        // Update chart with new data
        myChart.data = data;
        myChart.update();
    }
</script>

<script>

</script>



@endsection
  
