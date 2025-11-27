@extends('layout')

@section('content')

<h2>Calendario de Eventos</h2>

<form method="POST" action="{{ route('calendar.store') }}" class="mb-4">
    @csrf
    <label>Fecha:</label>
    <input type="date" name="date" class="form-control" required>
    <label>Hora:</label>
    <input type="time" name="time" class="form-control" required>
    <label>Título del evento:</label>
    <input type="text" name="title" class="form-control" required>
    <label>Recordatorio (fecha y hora):</label>
    <input type="datetime-local" name="reminder_time" class="form-control">
    <label>Texto del recordatorio:</label>
    <input type="text" name="reminder_text" class="form-control">
    <button class="btn btn-success mt-3">Crear evento</button>
</form>

<hr>

<h4>Eventos creados</h4>

@if (empty($events))
    <div class="alert alert-info">No hay eventos.</div>
@else
<table class="table table-bordered">
    <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Título</th>
        <th>Recordatorio</th>
        <th>Acciones</th>
    </tr>
    @foreach ($events as $e)
        <tr>
            <td>{{ $e['date'] }}</td>
            <td>{{ $e['time'] }}</td>
            <td>{{ $e['title'] }}</td>
            <td>
                @if (!empty($e['reminder_time']))
                    {{ $e['reminder_time'] }}<br>
                    <small>{{ $e['reminder_text'] }}</small>
                @else
                    <em>Sin recordatorio</em>
                @endif
            </td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('calendar.edit', $e['id']) }}">Editar</a>
                <a class="btn btn-sm btn-danger" href="{{ route('calendar.delete', $e['id']) }}">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
@endif

<!-- Alertas solo con JS en tiempo real -->
<script>
let events = @json($events);
let alerted = {}; // para no repetir alertas

function checkReminders() {
    let now = new Date();
    events.forEach(e => {
        if (e.reminder_time) {
            let reminder = new Date(e.reminder_time);
            let key = e.id;

            // Compara año, mes, día, hora y minuto exactos
            if (
                now.getFullYear() === reminder.getFullYear() &&
                now.getMonth() === reminder.getMonth() &&
                now.getDate() === reminder.getDate() &&
                now.getHours() === reminder.getHours() &&
                now.getMinutes() === reminder.getMinutes() &&
                !alerted[key]
            ) {
                alert(e.reminder_text || '¡Recordatorio!');
                alerted[key] = true;
            }
        }
    });
}

// Revisa cada 30 segundos (o cada minuto)
setInterval(checkReminders, 30000);
</script>

@endsection


