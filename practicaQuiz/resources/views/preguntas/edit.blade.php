@extends('app.base')

@section('title', 'Edit Preguntas')

@section('content')

<div class="container mt-4">
    <h2>Edit Question</h2>

    <form action="{{ url('preguntas/' . $preguntas->id) }}" method="post">
        @csrf
        @method('put')

        <!-- Form inputs -->
        <div class="mb-3">
            <label for="pregunta" class="form-label">Question</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" maxlength="60" required value="{{ old('pregunta', $preguntas->pregunta) }}">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Changes</button>
        <a href="{{ url('preguntas') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </form>

    <form class="formDelete mt-3" action="{{ url('preguntas/' . $preguntas->id) }}" method="post" style="display: inline-block">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete Question</button>
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
