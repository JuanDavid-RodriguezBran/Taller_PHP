@extends('layout')

@section('content')

<h2>Calculadora de Propinas</h2>

<form method="POST" action="{{ route('propinas.calculate') }}" class="mb-3">
    @csrf

    <div class="mb-3">
        <label>Monto</label>
        <input name="amount" type="number" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>% Propina</label>
        <input name="percent" type="number" step="0.1" value="10" class="form-control" required>
    </div>

    <button class="btn btn-primary">Calcular</button>
</form>

@if (!empty($result))
    <div class="card mt-3">
        <div class="card-body">
            <p>Monto: ${{ number_format($result['amount'], 2) }}</p>
            <p>Propina: ${{ number_format($result['tip'], 2) }} ({{ $result['percent'] }}%)</p>
            <p><strong>Total: ${{ number_format($result['total'], 2) }}</strong></p>
        </div>
    </div>
@endif

@endsection
