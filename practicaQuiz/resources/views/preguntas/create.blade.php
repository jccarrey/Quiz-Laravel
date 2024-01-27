@extends('app.base')
@section('title', 'Argo Create Question')
@section('content')
    <h2>Create Question</h2>

    <form action="{{ url('preguntas/') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta"  required value="{{ old('pregunta') }}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection
