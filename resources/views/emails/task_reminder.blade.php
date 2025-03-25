<!DOCTYPE html>
<html>
<head>
    <title>Przypomnienie o zadaniu</title>
</head>
<body>
    <h2>Cześć, masz zadanie do wykonania!</h2>
    <p>Przypomnienie o zadaniu: <strong>{{ $task->name }}</strong></p>
    <p>Termin: {{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</p>
    <p>Priorytet: {{ ucfirst($task->priority) }}</p>
    <p>Status: {{ ucfirst(str_replace('-', ' ', $task->status)) }}</p>
    <br>
    <p><a href="{{ route('tasks.index') }}">Przejdz do listy zadań</a></p>
</body>
</html>
