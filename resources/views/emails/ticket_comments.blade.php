<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
    <p>
     Comment: {{ $body }}
    </p>

    ---
    <p>Replied by: {{ $user->name }}</p>
    <p>Title: {{ $ticket->subject }}</p>
    <p>Ticket ID: {{ $ticket->id }}</p>
    <p>Status: {{ $ticket->status['name'] }}</p>
    <p>
        You can view the ticket at any time at {{ url('tickets/'. $ticket->ticket_id) }}
    </p>

</body>
</html>
