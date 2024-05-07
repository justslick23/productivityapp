<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
class ReportController extends Controller
{
    public function generate(Request $request)
    {
        // Validate the request data if necessary

        // Check the report type (weekly or monthly)
        $type = $request->query('type');

        // Handle the logic based on the report type
        if ($type === 'weekly') {
            // Generate weekly report logic
            // Retrieve tasks created within the last 7 days
            $tasks = Task::where('created_at', '>=', now()->subDays(7))->get();

            // Generate PDF report using $tasks data
        } elseif ($type === 'monthly') {
            // Generate monthly report logic
            // Retrieve tasks created within the current month
            $tasks = Task::whereYear('created_at', now()->year)
                         ->whereMonth('created_at', now()->month)
                         ->get();

            // Generate PDF report using $tasks data
        } else {
            // Handle unsupported report types or invalid requests
            return response()->json(['error' => 'Unsupported report type'], 400);
        }

        // Generate PDF report using $tasks data
        // Example using Dompdf:
        $pdf = PDF::loadView('reports.index', compact('tasks'));
        
        // Optionally, you can return the PDF as a download
        return $pdf->stream('report.pdf');
    }
}
