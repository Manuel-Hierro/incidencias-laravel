<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
   /*  public function index(){

        $usuarios = DB::table('usuario')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function detail($id){
        $usuario = DB::table('usuario')->where('id', '=', $id)->first();

        return view('usuario.detail', [
            'usuario' => $usuario
        ]);
    }

    public function create(){
        return view('usuario.create');
    }

    public function save(Request $request){
        $usuario = DB::table('usuario')->insert(array(
            'id' => $request->input('id'),
            'nif' => $request->input('nif'),
            'nombre' => $request->input('nombre'),
            'apellido1' => $request->input('apellido1')
        ));    

        return redirect()->action('UsuarioController@index')->with('status', 'Usuario creado correctamente');
    }

    public function delete($id){
        $usuario = DB::table('usuario')->where('id', $id)->delete();

        return redirect()->action('UsuarioController@index')->with('status', 'Usuario borrado correctamente');
    }

    public function edit($id){
        $usuario = DB::table('usuario')->where('id', $id)->first();

        return view('usuario.create', [
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request){
        $id =  $request->input('id');

        $usuario = DB::table('usuario')->where('id', $id)
                                       ->update(array(
                                        'nif' => $request->input('nif'),
                                        'nombre' => $request->input('nombre'),
                                        'apellido1' => $request->input('apellido1')
                                       ));

    return redirect()->action('UsuarioController@index')->with('status', 'Usuario actualizado correctamente');
  
    } */
}
