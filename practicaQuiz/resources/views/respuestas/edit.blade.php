@extends('app.base')

@section('title', 'Edit Respuesta')

@section('content')

<div class="container mt-4">
    <h3>Edit Answer</h3>

    <form action="{{ url('respuestas/' . $respuesta->id) }}" method="post">
        @csrf
        @method('put')

        <!-- Form inputs -->
        <div class="mb-3">
            <label for="respuesta" class="form-label">Answer</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta" maxlength="60" required value="{{ old('respuesta', $respuesta->respuesta) }}">
        </div>

        <div class="mb-3">
            <label for="esCorrecta" class="form-label">Correct Answer</label>
            <select class="form-control" id="esCorrecta" name="esCorrecta" required>
                <option value="1" {{ $respuesta->esCorrecta == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $respuesta->esCorrecta == 0 ? 'selected' : '' }}>No</option>
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

        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Changes</button>
        <a href="{{ url('respuestas') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </form>

    <form class="formDelete mt-3" action="{{ url('respuestas/' . $respuesta->id) }}" method="post" style="display: inline-block">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete Answer</button>
    </form>
</div>

<script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function (form) {
        form.onsubmit = () => {
            return confirm("Are you sure?");
        }
    });
</script>

@endsection
