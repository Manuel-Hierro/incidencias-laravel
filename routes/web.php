<?php

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
use App\User;
use App\Incidencia;
use App\Mensaje;
use App\Log;

Route::get('/', function () {

    /* $usuarios = User::all();
    foreach($usuarios as $usuario){
        echo $usuario->incidencias."<br>";
        echo "<hr/>";
    }
    $incidencias = Incidencia::all();
    foreach($incidencias as $incidencia){
        echo $incidencia->user->id."<br>";
        echo "<hr/>";
    } */

    return view('welcome');
});

//Rutas de la Web
/* Route::group(['prefix' => 'usuario'], function(){
    Route::get('index', 'UsuarioController@index');
    Route::get('detail/{id}', 'UsuarioController@detail');
    Route::get('crear', 'UsuarioController@create');

    Route::post('save', 'UsuarioController@save');

    Route::get('delete/{id}', 'UsuarioController@delete');
    Route::get('edit/{id}', 'UsuarioController@edit');

    Route::post('update', 'UsuarioController@update');

}); */


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* Rutas de Usuario */                                 //Nombre de la Ruta
Route::get('/usuarios/ver/{registros?}/{search?}', 'UserController@getUsers')->name('users_ver');
Route::get('/usuarios/crear', 'UserController@crear_user')->name('crear_user');
Route::post('/usuarios/guardar', 'UserController@guardar_user')->name('guardar_user');
Route::get('/usuarios/detalle/{id}', 'UserController@detalle');
Route::get('/usuarios/eliminar/{id}', 'UserController@eliminar');
Route::get('/usuarios/editar/{id}', 'UserController@editar');
Route::post('/usuarios/editar/update/{id}', 'UserController@editar_update')->name('editar_update');
Route::get('/usuarios/mensaje/{id}', 'UserController@mensaje')->name('mensaje');
Route::get('/configuracion', 'UserController@config')->name('user_config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/registros', 'UserController@list')->name('registro.list');
Route::get('aceptar/{id}', 'UserController@aceptar');
Route::get('rechazar/{id}', 'UserController@rechazar');

/* Curriculum */
Route::get('/curriculum', 'UserController@curriculum')->name('CKEditor');
Route::post('/curriculum/update', 'UserController@curriculum_update')->name('curriculum_update');

/* Rutas de Incidencias */                                              //Nombre de la Ruta
Route::get('/incidencias/ver/{registros?}', 'IncidenciaController@getIncidencias')->name('incidencia_ver');
Route::get('/incidencia/crear', 'IncidenciaController@crear')->name('incidencia_crear');
Route::get('/incidencia/eliminar/{id}', 'IncidenciaController@eliminar');
Route::get('/incidencia/editar/{id}', 'IncidenciaController@editar');
Route::post('/incidencia/editar/update/{id}', 'IncidenciaController@editar_update')->name('incidencia_editar_update');
Route::post('/incidencia/save', 'IncidenciaController@save')->name('incidencia_save');
Route::get('/incidencias/detalle/{id}', 'IncidenciaController@detalle');

/* Rutas de Mensajes */
Route::get('/mensajes/ver/{registros?}', 'MensajeController@getMensajes')->name('mensajes_ver');
Route::get('/mensajes/responder/{id}', 'MensajeController@mensaje')->name('mensaje_responder');
Route::get('/mensajes/enviar/{id}', 'MensajeController@enviar')->name('mensaje_enviar');
Route::get('/mensajes/detalle/{id}', 'MensajeController@detalle');
Route::get('/mensajes/eliminar/{id}', 'MensajeController@eliminar');

/* Rutas de Logs */
Route::get('/logs/{registros?}', 'LogController@logs')->name('logs_ver');

/* PDF */
Route::get('/users/pdf', 'UserController@pdf_Usuarios')->name('users_pdf');
Route::get('/incidencias/pdf', 'IncidenciaController@pdf_Incidencias')->name('incidencias_pdf');
Route::get('/mensajes/pdf', 'MensajeController@pdf_Mensajes')->name('mensajes_pdf');
Route::get('/logs/pdf', 'LogController@pdf_Logs')->name('logs_pdf');
Route::get('/user/pdf/curriculum', 'UserController@pdf_Curriculum')->name('curriculum_pdf');

/* Install */
Route::get('/install', 'InstallController@install_form')->name('install.form');
Route::post('/install/send', 'InstallController@install')->name('install.send');
