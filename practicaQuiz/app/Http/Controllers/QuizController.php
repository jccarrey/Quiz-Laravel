<?php

namespace App\Http\Controllers;
use App\Models\Preguntas;
use App\Models\Respuestas;
use App\Models\Historial;
use Illuminate\Http\Request;

class QuizController extends Controller
{
        public function index()
    {
        $preguntas = Preguntas::with('respuestas')->get();
        $historial = historial::All();
        return view('quiz.index', compact('preguntas','historial'));
    }
    
    public function verificarRespuesta(Request $request, $preguntaId, $respuestaId)
    {
        $pregunta = Preguntas::find($preguntaId);
        $respuesta = Respuestas::find($respuestaId);

        if ($pregunta && $respuesta) {
            if($respuesta->esCorrecta == 1){
                $esCorrecta = $respuesta->esCorrecta;
             
    $historial = new Historial();

    $historial->name = session('alias') ;
    $historial->pregunta = $pregunta->pregunta;
    $historial->acertado = true;
    $historial->respuesta = $respuesta->respuesta;

    // Guardar el modelo en la base de datos
    $historial->save();
                
            // Almacena el resultado en la sesión
            session(['verificacion' => true, 'pregunta' => true]);
            
            return redirect()->route('quiz.index');
            }else{
                  $historial = new Historial();

    $historial->name = session('alias') ;
    $historial->pregunta = $pregunta->pregunta;
    $historial->acertado = false;
    $historial->respuesta = $respuesta->respuesta;

    // Guardar el modelo en la base de datos
    $historial->save();
                 session(['verificacion' => true, 'pregunta' => false]);
                   return redirect()->route('quiz.index');
            }
            
        }

        return abort(404);
    }
      public function verHistorial(Request $request)
    {
        $nombre = session('alias');

        // Obtener registros de historial según el nombre
        $historial = Historial::where('name', $nombre)->get();

        return view('quiz.historial', compact('historial', 'nombre'));
    }
}
