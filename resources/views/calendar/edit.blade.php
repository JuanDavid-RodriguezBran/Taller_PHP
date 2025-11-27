@extends('layout')

@section('content')

<h2>Editar Evento</h2>

<form method="POST" action="{{ route('calendar.update', $event['id']) }}">
    @csrf

    <label>Fecha:</label>
    <input type="date" name="date" class="form-control"
           value="{{ $event['date'] }}" required>

    <label>Hora:</label>
    <input type="time" name="time" class="form-control"
           value="{{ $event['time'] }}" required>

    <label>Título:</label>
    <input type="text" name="title" class="form-control"
           value="{{ $event['title'] }}" required>

    <label>Recordatorio:</label>
    <input type="datetime-local" name="reminder_time"
           class="form-control"
           value="{{ $event['reminder_time'] }}">

    <label>Texto del recordatorio:</label>
    <input type="text" name="reminder_text"
           class="form-control"
           value="{{ $event['reminder_text'] }}">

    <button class="btn btn-primary mt-3">Guardar cambios</button>
    <a class="btn btn-secondary mt-3" href="{{ route('calendar.index') }}">Volver</a>
</form>

@endsection
