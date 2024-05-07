<!-- resources/views/emails/tasksInProgress.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks In Progress</title>
</head>
<body>
    <h2>Hello {{ $recipientName }},</h2>
    <p>Here are the tasks that are currently in progress:</p>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }} - {{ $task->description }}</li>
        @endforeach
    </ul>
</body>
</html>
