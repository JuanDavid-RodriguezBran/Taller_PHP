@extends('layout')

@section('content')

<h2>Gestor de Notas</h2>

<form method="POST" action="{{ route('notes.store') }}" class="mb-3">
    @csrf

    <div class="mb-2">
        <input name="title" class="form-control" placeholder="Título" required>
    </div>

    <div class="mb-2">
        <input name="category" class="form-control" placeholder="Categoría">
    </div>

    <div class="mb-2">
        <textarea name="content" class="form-control" placeholder="Contenido" rows="4" required></textarea>
    </div>

    <button class="btn btn-success">Guardar Nota</button>
</form>

<hr>

@if (empty($notes))
    <div class="alert alert-info">No hay notas.</div>
@else
    <div class="list-group">
        @foreach ($notes as $n)
            <div class="list-group-item">
                <h5>{{ $n['title'] }}</h5>
                <small>{{ $n['category'] }}</small>
                <p>{!! nl2br(e($n['content'])) !!}</p>
            </div>
        @endforeach
    </div>
@endif

@endsection
