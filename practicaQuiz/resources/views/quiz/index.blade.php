<!-- resources/views/kahoot/index.blade.php -->

@extends('app.base')

@section('title', 'Quiz Game')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Quiz</h1>

        <a href="{{ url('client/') }}" class="btn-danger btn">
                        <i class="fa fa-user"></i> Logout
                    </a>
        @foreach($preguntas as $pregunta)
            <div class="card mb-4">
                <div class="card-body">
                    <h2>{{ $pregunta->pregunta }}</h2>

                    <ul class="list-group">
                        @foreach($pregunta->respuestas as $respuesta)
                            <li class="list-group-item">
                                <form method="post" action="{{ route('verificar.respuesta', ['preguntaId' => $pregunta->id, 'respuestaId' => $respuesta->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">{{ $respuesta->respuesta }}</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    
                </div>
            </div>
        @endforeach

@if(session('pregunta'))
                        <p class="mt-3 text-success">{{ '¡Respuesta correcta!' }}</p>
                    @else
                        <p class="mt-3 text-danger">{{ 'Respuesta incorrecta.' }}</p>
                    @endif
        <div class="card mt-4">
            <div class="card-body">
                <h2>Historial</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">ID</th>
                            <th scope="col">Acertado</th>
                            <th scope="col">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historial as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->pregunta }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->acertado }}</td>
                                <td>{{ $item->respuesta }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
