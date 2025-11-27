@extends('layout')

@section('content')

<h2>Generador de Contraseñas</h2>

<form method="POST" action="{{ route('password.generate') }}" class="mb-3">
    @csrf

    <div class="mb-2">
        <label>Longitud</label>
        <input name="length" type="number" value="12" class="form-control" min="4" max="64">
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="upper" checked>
        <label class="form-check-label">Mayúsculas</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="numbers" checked>
        <label class="form-check-label">Números</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="symbols" checked>
        <label class="form-check-label">Símbolos</label>
    </div>

    <button class="btn btn-primary mt-2">Generar</button>
</form>

@if (!empty($pwd))
    <div class="alert alert-success">
        <strong>{{ $pwd }}</strong>
    </div>
@endif

@endsection
