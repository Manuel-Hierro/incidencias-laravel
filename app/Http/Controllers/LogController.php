<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Log;

class LogController extends Controller
{
    public function logs($registros = 5){
        /* FIELD, permite ordenar segun el orden de los valores elegidos */
        $logs = Log::orderBy('fecha_log')->paginate($registros);

        return view('log.ver', [
           'logs' => $logs
      ]);
   }

   /* PDF */
   public function pdf_Logs() {
      if (\Auth::user()->role == 'administrador') {
          $logs = Log::all();
                              /* Vista que carga */
          $pdf = PDF::loadView('log.pdf', compact('logs'));

          return $pdf->stream('Lista de Logs.pdf');
      } else {

          return redirect()->route('logs_ver')
                           ->with(['message_error' => 'No estas autorizado']);
      }
  }
}
