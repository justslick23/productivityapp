<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <!-- Include CSS asset -->
    <link rel="stylesheet" href="path/to/your/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        /* CSS for table borders and striped rows */

        body {

            font-family: "Roboto", sans-serif;

        }
        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        /* Apply background color to alternate rows */
        tr:nth-child(even) {
            background-color: #f0f8ff; /* Light shade of blue */
        }
        /* Header row style */
        th {
            background-color: rgba(0, 123, 255, 0.7); /* Blue color with reduced opacity */
            color: white; /* White text color */
        }
    </style>
</head>
<body>
    <h2>Report</h2>
    <table>
        <thead>
            <tr>
                <td colspan="2">Consultant Name:</td>
                <td colspan="3">{{ auth()->user()->name }}</td>

            </tr>
            <tr>
                <th>Projects</th>
                <th colspan="4">
                    @foreach($tasks as $index => $task)
                        {{ $task->client->name }}
                        @if($index < $tasks->count() - 1)
                            ,
                        @endif
                    @endforeach
                </th>
            </tr>
            <tr>
                <th>System/Task</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Task Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
