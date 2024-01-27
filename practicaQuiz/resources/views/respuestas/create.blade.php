@extends('app.base')
@section('title', 'Argo Create Respuestas')
@section('content')

<div class="container mt-4">
    <h2>Create Answer</h2>

    <form action="{{ url('respuestas') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="respuesta" class="form-label">Answer</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta" required value="{{ old('respuesta') }}">
        </div>

        <div class="mb-3">
            <label for="esCorrecta" class="form-label">Correct Answer</label>
            <select class="form-control" id="esCorrecta" name="esCorrecta" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_pregunta" class="form-label">Select Question</label>
            <select class="form-control" id="id_pregunta" name="id_pregunta" required>
                @foreach($preguntas as $pregunta)
                    <option value="{{ $pregunta->id }}">{{ $pregunta->pregunta }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
        <a class="btn btn-primary" href="{{ url('respuestas/') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </form>
</div>

@endsection
