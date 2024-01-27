@extends('app.base')

@section('title', 'Argo Create Client')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Guardar Alias</h5>
                </div>
                <div class="card-body">
                    <!-- Alias Form -->
                    <form action="{{ route('client.saveAlias') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="alias">Alias:</label>
                            <input type="text" class="form-control" name="alias" id="alias" required>
                        </div>
                        <button class="btn btn-success" type="submit">Guardar Alias</button>
                    </form>

                    <!-- Display Messages -->
                    @if(session('message'))
                        <div class="mt-3 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if(session('alias'))
                        <div class="mt-3 alert alert-info">
                            El alias almacenado en la sesión es: {{ session('alias') }}
                        </div>
                    @else
                        <div class="mt-3 alert alert-warning">
                            No hay alias almacenado en la sesión.
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ url('admin/') }}" class="btn btn-info btn-block">
                        <i class="fa fa-user"></i> Ir a Admin
                    </a>
        </div>
    </div>
</div>

@endsection
