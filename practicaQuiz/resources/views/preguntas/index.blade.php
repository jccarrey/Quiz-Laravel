@extends('app.base')
@section('title', 'Argo Create Preguntas')
@section('content')

<div class="container mt-4">
    <h2>Questions</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preguntas as $pregunta)
                    <tr>
                        <td>{{ $pregunta->id }}</td>
                        <td>{{ $pregunta->pregunta }}</td>
                        <td>
                            <a href="{{ url('preguntas/' . $pregunta->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ url('preguntas/' . $pregunta->id . '/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a> 
                            <form class="formDelete" action="{{ url('preguntas/' . $pregunta->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-primary" href="{{ url('preguntas/create') }}"><i class="fa fa-plus"></i> Create Question</a>
        <a class="btn btn-primary" href="{{ url('admin/') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div> <!-- /.table-responsive -->
</div>

<script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Are you sure?");
        }
    });
</script>

@endsection
