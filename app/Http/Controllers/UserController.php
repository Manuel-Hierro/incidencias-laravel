<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use PDF;
use App\User;
use App\Mensaje;
/*
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
*/

/* Otra forma de Consultar la Base de Datos */
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /* Ejecuta el Middleware para impedir entrar si no estas identificado */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers($registros = 5, $search = null){

       if(!empty($search)) {
            $users = User::where('nick', 'LIKE', '%'.$search.'%')
                            ->orwhere('nombre', 'LIKE', '%'.$search.'%')
                            ->orderBy('id', 'asc')
                            ->paginate($registros);
       }
       else{
            $users = User::orderBy('id', 'asc')->paginate($registros);
       }

        /* Nombre de la Vista que deseamos mostrar */
        return view('user.ver', [
           'users' => $users
      ]);

    }

    public function config(){
        return view('user.config');
    }

    public function detalle($id){

        /* Buscamos el Usuario pasado por parametro */
        $user = User::find($id);

       return view('user.detalle', [
            'user' => $user
       ]);

     }

    public function update(Request $request){

        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        // Validacion del formulario
        $validate = $this->validate($request, [
            'nif' => ['string', 'max:255', 'unique:users,nif,'.$id],
            'nombre' => ['string', 'max:255'],
            'apellido1' => ['string', 'max:255'],
            'apellido2' => ['string', 'max:255'],
            'nick' => ['string', 'max:255', 'unique:users,nick,'.$id],
            //'password' => ['string', 'min:6', 'confirmed'],
            /* 'role' => ['required', 'string', 'max:255'], */
            'email' => [ 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            /* 'image' => ['string', 'max:255'], */
            //'telefono' => ['string', 'max:255'],
            'departamento' => ['string', 'max:255']
            /* 'fecha' => ['string', 'max:255'], */
            /* 'activo' => ['string', 'max:255'] */
        ]);

        // Recoger datos del formulario
        $id = \Auth::user()->id;
        $nif = $request->input('nif');
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $nick = $request->input('nick');
        $password = $request->input('password');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $departamento = $request->input('departamento');

        // Asignar nuevos valores al objeto del usuario
        $user->nif = $nif;
        $user->nombre = $nombre;
        $user->apellido1 = $apellido1;
        $user->apellido2 = $apellido2;
        $user->nick = $nick;
        $user->password = $password;
        $user->email = $email;
        $user->telefono = $telefono;
        $user->departamento = $departamento;

        // Subir la imagen
        $image = $request->file('image');
        if($image){
        // Poner nombre unico
        $image_name = time().$image->getClientOriginalName();

        // Guardar en la carpeta storage (storage/app/users)
        Storage::disk('users')->put($image_name, File::get($image));

        // Seteo el nombre de la imagen en el objeto
        $user->image = $image_name;
        }

        // Ejecutar consulta y cambios en la DB
        $user->update();
        return redirect()->route('user_config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function list(){

        $users = User::orderBy('nombre', 'desc')->where('activo', '=', 0)->paginate(5);

        return view('registro.list', [
            'users' => $users
       ]);
    }

    public function aceptar($id){

        /* Buscamos el Usuario pasado por parametro */
        $user = User::find($id);

        /* Actualizamos el campo 'activo' */
        $user->update(['activo' => 1]);

        return redirect()->route('registro.list')
                         ->with(['message'=>'Usuario Activado correctamente']);
    }

    public function rechazar($id){

        /* Buscamos el Usuario pasado por parametro */
        $user = User::find($id);

        /* Actualizamos el campo 'activo' */
        $user->logs()->delete();
        $user->mensajes()->delete();
        $user->incidencias()->delete();
        $user->delete();

        return redirect()->route('registro.list')
                         ->with(['message'=>'Usuario Activado correctamente']);
    }

    public function editar($id){

        $user = User::find($id);

        return view('user.editar', [
            'user' => $user
       ]);
    }

    public function editar_update(Request $request, $id){

        /* Buscamos el Usuario pasado por parametro */
        $user = User::find($id);

        $id = $user->id;

        // Validacion del formulario
        $validate = $this->validate($request, [
            'nif' => ['string', 'max:255', 'unique:users,nif,'.$id],
            'nombre' => ['string', 'max:255'],
            'apellido1' => ['string', 'max:255'],
            'apellido2' => ['string', 'max:255'],
            'nick' => ['string', 'max:255', 'unique:users,nick,'.$id],
            //'password' => ['string', 'min:6', 'confirmed'],
            /* 'role' => ['required', 'string', 'max:255'], */
            'email' => [ 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            /* 'image' => ['string', 'max:255'], */
            //'telefono' => ['string', 'max:255'],
            'departamento' => ['string', 'max:255']
            /* 'fecha' => ['string', 'max:255'], */
            /* 'activo' => ['string', 'max:255'] */
        ]);

        // Recoger datos del formulario
        $nif = $request->input('nif');
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $nick = $request->input('nick');
        $password = $request->input('password');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $departamento = $request->input('departamento');

        // Asignar nuevos valores al objeto del usuario
        $user->nif = $nif;
        $user->nombre = $nombre;
        $user->apellido1 = $apellido1;
        $user->apellido2 = $apellido2;
        $user->nick = $nick;
        $user->password = $password;
        $user->email = $email;
        $user->telefono = $telefono;
        $user->departamento = $departamento;

        // Subir la imagen
        $image = $request->file('image');
        if($image){
        // Poner nombre unico
        $image_name = time().$image->getClientOriginalName();

        // Guardar en la carpeta storage (storage/app/users)
        Storage::disk('users')->put($image_name, File::get($image));

        // Seteo el nombre de la imagen en el objeto
        $user->image = $image_name;
        }

        // Ejecutar consulta y cambios en la DB
        $user->update();

        return redirect()->route('users_ver')
                         ->with(['message'=>'Usuario Actualizado correctamente']);
    }

    public function eliminar($id){

        /* Buscamos el Usuario pasado por parametro */
        $user = User::find($id);

        /* Actualizamos el campo 'activo' */
        $user->logs()->delete();
        $user->mensajes()->delete();
        $user->incidencias()->delete();
        $user->delete();

        return redirect()->route('users_ver')
                         ->with(['message'=>'Usuario Eliminado correctamente']);
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

        return redirect()->route('users_ver')
                         ->with(['message'=>'Mensaje enviado correctamente']);
    }

    public function crear_user(){
        return view('user.crear');
    }

    public function guardar_user(Request $request){

        // Validacion del formulario
        $validate = $this->validate($request, [
            'nif' => ['string', 'max:255', 'unique:users,nif,'],
            'nombre' => ['string', 'max:255'],
            'apellido1' => ['string', 'max:255'],
            'apellido2' => ['string', 'max:255'],
            'nick' => ['string', 'max:255', 'unique:users,nick,'],
            //'password' => ['string', 'min:6', 'confirmed'],
            /* 'role' => ['required', 'string', 'max:255'], */
            'email' => [ 'string', 'email', 'max:255', 'unique:users,email,'],
            /* 'image' => ['string', 'max:255'], */
            //'telefono' => ['string', 'max:255'],
            'departamento' => ['string', 'max:255']
            /* 'fecha' => ['string', 'max:255'], */
            /* 'activo' => ['string', 'max:255'] */
        ]);

        // Recoger datos del formulario
        $nif = $request->input('nif');
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $nick = $request->input('nick');
        $password = $request->input('password');
        $role = $request->input('role');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $departamento = $request->input('departamento');
        $fecha = date('Y-m-d H:i:s');
        $activo = true;

        // Asignar nuevos valores al objeto del usuario
        $user = new User();
        $user->nif = $nif;
        $user->nombre = $nombre;
        $user->apellido1 = $apellido1;
        $user->apellido2 = $apellido2;
        $user->nick = $nick;
        $user->password = $password;
        $user->role = $role;
        $user->email = $email;
        $user->telefono = $telefono;
        $user->departamento = $departamento;
        $user->fecha = $fecha;
        $user->activo = $activo;

        // Subir la imagen
        $image = $request->file('image');
        if($image){
        // Poner nombre unico
        $image_name = time().$image->getClientOriginalName();

        // Guardar en la carpeta storage (storage/app/users)
        Storage::disk('users')->put($image_name, File::get($image));

        // Seteo el nombre de la imagen en el objeto
        $user->image = $image_name;
        }

        // Ejecutar consulta y cambios en la DB
        $user->save();
        return redirect()->route('users_ver')
                         ->with(['message'=>'Usuario Creado correctamente']);
    }

    /* PDF */
    public function pdf_Usuarios() {
        if (\Auth::user()->role == 'administrador') {
            $users = User::all();

            $pdf = PDF::loadView('user.pdf', compact('users'));

            return $pdf->stream('Lista de Usuarios.pdf');
        } else {
            return redirect()->route('users_ver')
                             ->with(['message_error' => 'No estas autorizado']);
        }
    }

    public function pdf_Curriculum() {
        if (\Auth::user()->role == 'administrador') {

            $user = User::find(\Auth::user()->id);

            $curriculum = $user->curriculum;

            $pdf = PDF::loadHTML($curriculum);

            return $pdf->stream('Curriculum de ' . ucfirst($user->nombre).'.pdf');
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'No estas autorizado']);
        }
    }

    /* CURRICULUM */
    public function curriculum(){
        return view('ckeditor');
    }

    public function curriculum_update(Request $request) {

        // Recogemos el contenido del formulario
        $content = $request->input('content');

        // Cogemos el usuario que modificará su currículum
        $user = \Auth::user();
        $user->curriculum = $content;

        // Actualizamos al usuario
        $user->update();
        return redirect()->route('CKEditor')
                        ->with(['message' => 'Tu Curriculum Vitae ha sido actualizado']);
    }

}
