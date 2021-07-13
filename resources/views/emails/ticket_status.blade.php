<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket Status</title>
</head>
<body>
    <p>
        Hello {{ ucfirst($user->name) }},
    </p>
    <p>
        Your support ticket with ID #{{ $ticket->id }} has been marked has resolved and {{ $ticket->status['name']}}.
    </p>
</body>
</html>