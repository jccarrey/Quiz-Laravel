<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\AliasController;
use App\Http\Controllers\QuizController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',function(){
    return redirect('/client');
});

Route::resource('preguntas', PreguntasController::class);

Route::resource('respuestas',RespuestasController::class);
Route::resource('admin', SpaceController::class);


Route::get('client', [AliasController::class, 'showForm'])->name('client.form');
Route::post('client', [AliasController::class, 'saveAlias'])->name('client.saveAlias');

Route::get('/mostrar-alias', function () {
    $alias = session('alias');
    return "El alias almacenado en la sesión es: $alias";
});
Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz/verificar/{preguntaId}/{respuestaId}', [QuizController::class, 'verificarRespuesta'])->name('verificar.respuesta');


Route::get('/quiz/historial', [QuizController::class, 'historial']);