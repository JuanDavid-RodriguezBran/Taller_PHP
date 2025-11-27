@extends('layout')

@section('content')

<h2>Lista de Tareas</h2>

{{-- Formulario agregar --}}
<form method="POST" action="{{ route('tareas.store') }}" class="mb-3 d-flex">
    @csrf
    <input name="text" class="form-control me-2" placeholder="Nueva tarea..." required>
    <button class="btn btn-success">Agregar</button>
</form>

@if (empty($tasks))
    <div class="alert alert-info">No hay tareas.</div>
@else

<ul class="list-group">
@foreach ($tasks as $t)

    @php
        $color = match($t['status']) {
            'pendiente' => 'secondary',
            'iniciada' => 'warning',
            'completada' => 'success',
            default => 'secondary'
        };
    @endphp

    <li class="list-group-item d-flex justify-content-between align-items-center">

        <div>
            <span class="badge bg-{{ $color }} me-2">{{ ucfirst($t['status']) }}</span>
            <strong>{{ $t['text'] }}</strong>
        </div>

        <div class="d-flex">

            {{-- Cambiar estado --}}
            <form method="POST" action="{{ route('tareas.updateStatus', $t['id']) }}" class="me-2 d-flex">
                @csrf
                @method('PATCH')

                <select name="status" class="form-select form-select-sm me-2">
                    <option value="pendiente"   {{ $t['status'] === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="iniciada"    {{ $t['status'] === 'iniciada' ? 'selected' : '' }}>Iniciada</option>
                    <option value="completada"  {{ $t['status'] === 'completada' ? 'selected' : '' }}>Completada</option>
                </select>

                <button class="btn btn-primary btn-sm">Actualizar</button>
            </form>

            {{-- Eliminar --}}
            <form method="POST" action="{{ route('tareas.destroy', $t['id']) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Eliminar</button>
            </form>

        </div>
    </li>

@endforeach
</ul>

@endif

@endsection
