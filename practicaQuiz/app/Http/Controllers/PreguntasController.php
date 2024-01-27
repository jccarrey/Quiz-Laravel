<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;

use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function index()
    {
        $preguntas = Preguntas::all();
       
    
        return view('preguntas.index', ['preguntas' => $preguntas]);
            // return view('preguntas.create', ['pregunta' => $preguntas]);

    }

    public function create()
    {
        return view('preguntas/create');
    }

    public function store(Request $request)
    {
        $preguntas = new Preguntas($request->all());

        try {
            $result = $preguntas->save();

            $checked = session('afterInsert', 'show preguntas');
            $target = 'preguntas';

            if ($checked != 'show preguntas') {
                $target = $target . '/create';
            }

            return redirect($target)->with(['message' => 'The question has been saved']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The question has not been saved']);
        }
    }
    public function edit($idpregunta)
    {
        
        $preguntas = Preguntas::find($idpregunta);
        return view('preguntas.edit', ['preguntas' => $preguntas]);
    }
   public function show($idpreguntas)
    {
         $preguntas = Preguntas::find($idpreguntas);
         return view('preguntas.show', ['pregunta' => $preguntas]);
    }
    
    public function update(Request $request, $idpreguntas)
    {
        $preguntas = Preguntas::find($idpreguntas);
        try {
            // Actualizar los campos con los nuevos datos del formulario
            $preguntas->fill($request->all());
       
            // Intentar guardar los cambios
            $result = $preguntas->save();
            $this->validate($request, [
                        'pregunta' => 'required|max:255', // Limita el título a 255 caracteres
            ]);
    
            return redirect('preguntas')->with(['message' => 'The question has been updated']);
            
            // Si se guardó correctamente, redirigir a alguna vista, por ejemplo, la lista de juegos
        } catch (\Exception $e) {
            // En caso de error al guardar, regresar a la página anterior con los datos para corregir
            return back()->withInput()->withErrors(['message' => 'The question has not been updated']);
        }
    }
    public function destroy($idpreguntas)
    {
        $preguntas = Preguntas::find($idpreguntas);
        try {
            $preguntas->delete();
            return redirect('preguntas')->with(['message' => 'The question has been deleted.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'The question has not been deleted.']);
        }
    }
}
