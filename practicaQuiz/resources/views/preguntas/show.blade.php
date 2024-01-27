@extends('app.base')

@section('title', 'Argo Show Preguntas')

@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
      
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $pregunta->id }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $pregunta->pregunta }}</td>
            </tr>
          
        </tbody>
    </table>
    <a href="{{ url('/preguntas/' . $pregunta->id . '/edit')}}" class="btn btn-success"><i class="fa fa-magic"></i>Edit</a> 
     <a href="{{ url('/preguntas') }}" class="btn btn-primary">Back</a>
     <form class="formDelete" action="{{ url('preguntas' . $pregunta->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn-danger btn" type="submit" >Delete</button>
                    </form>
       
        <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    

</script>        
</div>
@endsection