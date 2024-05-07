<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Project;

class ProjectEndNotification extends Notification
{
    use Queueable;

    protected $project;
    protected $notificationType;

    public function __construct(Project $project, $notificationType)
    {
        $this->project = $project;
        $this->notificationType = $notificationType;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Project End Date Notification')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('This is a notification regarding your project: ' . $this->project->name)
            ->line('For the client: ' . $this->project->client->name)

            ->line('The end date of the project is within ' . $this->notificationType . '.')
            ->line('Please take necessary actions to ensure timely completion.')
            ->action('View Project', url('/projects/' . $this->project->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            // If you need to send notification data as an array
        ];
    }
}
