@extends('app.base')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Opciones</h5>
                </div>
                <div class="card-body">
                    <a href="{{ url('respuestas/') }}" class="btn btn-primary btn-block">Ir a Respuestas</a>
                    <a href="{{ url('preguntas/') }}" class="btn btn-success btn-block">
                        <i class="fa fa-magic"></i> Ir a Preguntas
                    </a>
                    <a href="{{ url('client/') }}" class="btn btn-info btn-block">
                        <i class="fa fa-user"></i> Ir a Clientes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
