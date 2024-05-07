<?php

// app/Console/Commands/SendInProgressTasks.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Mail;

class SendInProgressTasks extends Command
{
    protected $signature = 'tasks:send-in-progress';
    protected $description = 'Send email with tasks in progress';

    public function handle()
    {
        $tasks = Task::where('status', 'In Progress')->get();
        $recipientName = 'Tokelo Foso'; // Replace with actual recipient's name

        // Send email with tasks
        Mail::send('emails.tasksInProgress', ['tasks' => $tasks, 'recipientName' => $recipientName], function($message) {
            $message->to('tokelo.foso@cbs.co.ls')->subject('Tasks In Progress');
        });
    }
}
