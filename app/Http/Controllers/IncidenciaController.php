<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Incidencia;

class IncidenciaController extends Controller
{
    /* Ejecuta el Middleware para impedir entrar si no estas identificado */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIncidencias($registros = 5){
        /* FIELD, permite ordenar segun el orden de los valores elegidos */
        $incidencias = Incidencia::orderByRaw('FIELD(prioridad, "alta", "media", "baja")')->paginate($registros);

        /* Nombre de la Vista que deseamos mostrar */
        return view('incidencia.ver', [
           'incidencias' => $incidencias
      ]);
   }

   public function detalle($id){

    /* Buscamos la Incidencia pasada por parametro */
    $incidencia = Incidencia::find($id);

   return view('incidencia.detalle', [
        'incidencia' => $incidencia
   ]);

 }

    public function crear(){
        return view('incidencia.crear');
    }

    public function save(Request $request){

        // Validacion del formulario
        $validate = $this->validate($request, [
            'prioridad' => ['string', 'max:255'],
            'aula' => ['string', 'max:255'],
            'asunto' => ['string', 'max:255'],
            'descripcion' => ['string', 'max:255']
        ]);

        // Recoger datos del formulario
        $prioridad = $request->input('prioridad');
        $aula = $request->input('aula');
        $asunto = $request->input('asunto');
        $descripcion = $request->input('descripcion');

        // Asignar nuevos valores al objeto del usuario
        $user = \Auth::user();

        $incidencia = new Incidencia();

        $incidencia->user_id = $user->id;
        $incidencia->fecha_incidencia = date('Y-m-d H:i:s');

        $incidencia->prioridad = $prioridad;
        $incidencia->aula = $aula;
        $incidencia->asunto = $asunto;
        $incidencia->descripcion = $descripcion;

        $incidencia->save();

        return redirect()->route('incidencia_ver')
                         ->with(['message'=>'Incidencia creada correctamente']);


        /* var_dump($incidencia);
        die();  */
    }

    public function editar($id){

        $incidencia = Incidencia::find($id);

        return view('incidencia.editar', [
            'incidencia' => $incidencia
       ]);
    }

    public function editar_update(Request $request, $id){

        /* Buscamos el Usuario pasado por parametro */
        $incidencia = Incidencia::find($id);

        $id = $incidencia->id;

        // Validacion del formulario
        $validate = $this->validate($request, [
            'fecha_incidencia' => ['string', 'max:255'],
            'prioridad' => ['string', 'max:255'],
            'aula' => ['string', 'max:255'],
            'asunto' => ['string', 'max:255'],
            'descripcion' => [ 'string', 'max:255']
        ]);

        // Recoger datos del formulario
        $fecha_incidencia = $request->input('fecha_incidencia');
        $prioridad = $request->input('prioridad');
        $aula = $request->input('aula');
        $asunto = $request->input('asunto');
        $descripcion = $request->input('descripcion');

        // Asignar nuevos valores al objeto del usuario
        $incidencia->fecha_incidencia = $fecha_incidencia;
        $incidencia->prioridad = $prioridad;
        $incidencia->aula = $aula;
        $incidencia->asunto = $asunto;
        $incidencia->descripcion = $descripcion;

        // Ejecutar consulta y cambios en la DB
        $incidencia->update();

        return redirect()->route('incidencia_ver')
                         ->with(['message'=>'Incidencia Actualizada correctamente']);
    }

    public function eliminar($id){

        /* Buscamos el Usuario pasado por parametro */
        $incidencia = Incidencia::find($id);

        /* Actualizamos el campo 'activo' */
        /* $incidencia->logs()->delete();
        $incidencia->mensajes()->delete();
        $incidencia->incidencias()->delete(); */
        $incidencia->delete();

        return redirect()->route('incidencia_ver')
                         ->with(['message'=>'Incidencia Eliminada correctamente']);
    }

    /* PDF */
    public function pdf_Incidencias() {
        if (\Auth::user()->role == 'administrador') {
            $incidencias = Incidencia::all();

            $pdf = PDF::loadView('incidencia.pdf', compact('incidencias'));

            return $pdf->stream('Lista de Incidencias.pdf');
        } else {
            return redirect()->route('incidencias_ver')
                             ->with(['message_error' => 'No estas autorizado']);
        }
    }
}
