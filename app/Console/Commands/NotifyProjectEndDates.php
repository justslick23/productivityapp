<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectEndNotification;

class NotifyProjectEndDates extends Command
{
    protected $signature = 'notify:project-end-dates';
    protected $description = 'Send email notifications for projects with end dates within specific intervals';

    public function handle()
    {
        // Get projects with end dates within specific intervals
        $projects = Project::whereDate('end_date', '<=', Carbon::now()->addDays(90))
                           ->whereDate('end_date', '>=', Carbon::now())
                           ->get();

        // Send email notifications for each project
        foreach ($projects as $project) {
            $daysUntilEnd = Carbon::now()->diffInDays($project->end_date);
            $notificationType = '';
            if ($daysUntilEnd <= 90 && $daysUntilEnd > 60) {
                $notificationType = '90 days';
            } elseif ($daysUntilEnd <= 60 && $daysUntilEnd > 30) {
                $notificationType = '60 days';
            } elseif ($daysUntilEnd <= 30) {
                $notificationType = '30 days';
            }
            
            // Send email notification
            Mail::to($project->user->email)->send(new ProjectEndNotification($project, $notificationType));
        }

        $this->info('Project end date notifications sent successfully.');
    }
}
