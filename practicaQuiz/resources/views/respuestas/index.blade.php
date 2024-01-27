@extends('app.base')
@section('title', 'Argo Create Respuestas') 
@section('content')

<div class="container mt-4">
    <h3>Respuestas</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Respuestas</th>
                    <th scope="col">Correcta</th>
                    <th scope="col">ID Pregunta</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($respuestas as $respuesta)
                    <tr>
                        <td>{{ $respuesta->id }}</td>
                        <td>{{ $respuesta->respuesta }}</td>
                        <td>{{ $respuesta->esCorrecta }}</td>
                        <td>{{ $respuesta->id_pregunta }}</td>
                        <td>
                            <a href="{{ url('respuestas/' . $respuesta->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ url('respuestas/' . $respuesta->id . '/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a> 
                            <form class="formDelete" action="{{ url('respuestas/' . $respuesta->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-primary" href="{{ url('respuestas/create') }}"><i class="fa fa-plus"></i> Create Respuesta</a>
        <a class="btn btn-primary" href="{{ url('admin/') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
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
