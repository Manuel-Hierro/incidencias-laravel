<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Mensaje;

class MensajeController extends Controller
{
   /* Ejecuta el Middleware para impedir entrar si no estas identificado */
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function getMensajes($registros = 5){

        $mensajes = Mensaje::orderBy('fecha_mensaje')->paginate($registros);

        return view('mensaje.ver', [
           'mensajes' => $mensajes
      ]);
   }

   public function detalle($id){

    /* Buscamos el Usuario pasado por parametro */
    $mensaje = Mensaje::find($id);

   return view('mensaje.detalle', [
        'mensaje' => $mensaje
   ]);

 }

   public function mensaje(Request $request, $id){

      /* Buscamos el Usuario pasado por parametro */
      //$user = User::find($id);
      //$id = $user->id;

      // Validacion del formulario
      $validate = $this->validate($request, [
          'asunto' => ['string', 'max:255'],
          'contenido' => ['string', 'max:255']
      ]);

      // Recoger datos del formulario
      $asunto = $request->input('asunto');
      $contenido = $request->input('contenido');

      // Asignar nuevos valores al objeto del usuario
      $user = \Auth::user();

      $mensaje = new Mensaje();
      $mensaje->user_id = $user->id;
      $mensaje->destinatario_id = $id;

      $mensaje->fecha_mensaje = date('Y-m-d H:i:s');
      $mensaje->asunto = $asunto;
      $mensaje->contenido = $contenido;

      $mensaje->save();

      return redirect()->route('mensajes_ver')
                       ->with(['message'=>'Mensaje enviado correctamente']);
  }

  public function enviar(Request $request, $id){

    /* Buscamos el Usuario pasado por parametro */
    //$user = User::find($id);
    //$id = $user->id;

    // Validacion del formulario
    $validate = $this->validate($request, [
        'asunto' => ['string', 'max:255'],
        'contenido' => ['string', 'max:255']
    ]);

    // Recoger datos del formulario
    $usuario = $request->input('usuario');
    $asunto = $request->input('asunto');
    $contenido = $request->input('contenido');

    // Asignar nuevos valores al objeto del usuario

    $mensaje = new Mensaje();
    $mensaje->user_id = $id;
    $mensaje->destinatario_id = $usuario;

    $mensaje->fecha_mensaje = date('Y-m-d H:i:s');
    $mensaje->asunto = $asunto;
    $mensaje->contenido = $contenido;

    $mensaje->save();

    return redirect()->route('mensajes_ver')
                     ->with(['message'=>'Mensaje enviado correctamente']);
}

public function eliminar($id){

    /* Buscamos el Usuario pasado por parametro */
    $mensaje = Mensaje::find($id);

    /* Actualizamos el campo 'activo' */
  /*   $mensaje->logs()->delete();
    $mensaje->mensajes()->delete();
    $mensaje->incidencias()->delete(); */
    $mensaje->delete();

    return redirect()->route('mensajes_ver')
                     ->with(['message'=>'Mensaje Eliminado correctamente']);
}

 /* PDF */
 public function pdf_Mensajes() {
    if (\Auth::user()->role == 'administrador') {
        $mensajes = Mensaje::all();

        $pdf = PDF::loadView('mensaje.pdf', compact('mensajes'));

        return $pdf->stream('Lista de Mensajes.pdf');
    } else {
        return redirect()->route('mensajes_ver')
                         ->with(['message_error' => 'No estas autorizado']);
    }
}
}
