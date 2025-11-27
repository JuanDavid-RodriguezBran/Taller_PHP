@extends('layout')

@section('content')

<h2>Plataforma de Encuestas</h2>

<h4>Crear encuesta</h4>
<form method="POST" action="{{ route('encuestas.store') }}" class="mb-3">
    @csrf

    <div class="mb-2">
        <input name="title" class="form-control" placeholder="Título" required>
    </div>

    <div class="mb-2">
        <input name="options" class="form-control" placeholder="Opciones separadas por comas (Ej: Si, No, Tal vez)" required>
    </div>

    <button class="btn btn-primary">Crear</button>
</form>

<hr>

<h4>Encuestas</h4>

@if (empty($surveys))
    <div class="alert alert-info">No hay encuestas.</div>
@else
    @foreach ($surveys as $s)
        <div class="card mb-2">
            <div class="card-body">

                <h5>{{ $s['title'] }}</h5>

                <form method="POST" action="{{ route('encuestas.respond', $s['id']) }}">
                    @csrf

                    @foreach ($s['options'] as $i => $opt)
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="choice"
                                   value="{{ $i }}"
                                   id="opt{{ $s['id'] . $i }}"
                                   @checked($i === 0)>

                            <label class="form-check-label" for="opt{{ $s['id'] . $i }}">
                                {{ $opt }}
                            </label>
                        </div>
                    @endforeach

                    <button class="btn btn-success mt-2">Responder</button>
                </form>

                <h6 class="mt-3">Resultados</h6>
                <ul>
                    @foreach ($s['options'] as $i => $opt)
                        <li>
                            {{ $opt }}: {{ $s['results'][$i] }}
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    @endforeach
@endif

@endsection
