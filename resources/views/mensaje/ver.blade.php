@extends('layouts.app')

@section('content')

<div class="">
    <div class="row justify-content-center">
        <h1>Lista de Mensajes</h1>
    <div class="table-responsive">

        @include('includes.message')

        <table class="table table-striped table-dark text-center">
            <div class="text-center">
                <br>
                <!-- Button trigger modal Enviar -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Enviar{{ Auth::user()->id }}">Enviar Mensaje</button>
                <a class="btn btn-success text-center" href="{{ route('mensajes_pdf')}}">Generar PDF</a>
                <div class="btn-group dropright">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Nº Registros
                    </button>
                    <div class="dropdown-menu" x-placement="right-start"
                        style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item"
                            href="{{ action('MensajeController@getMensajes', [$registros = 2]) }}">2</a>
                        <a class="dropdown-item"
                            href="{{ action('MensajeController@getMensajes', [$registros = 5]) }}">5</a>
                        <a class="dropdown-item"
                            href="{{ action('MensajeController@getMensajes', [$registros = 10]) }}">10</a>
                    </div>
                </div>
            </div>
            <br>
            <tr class="">
                <th>Id</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Fecha y Hora</th>
                <th>Contenido</th>
                <th></th>
                <th>Acciones</th>
                <th></th>
            </tr>
            @foreach($mensajes as $mensaje)
            <tr>
                <td>{{ $mensaje->user->id }}</td>
                <td>{{ $mensaje->user->nick }}</td>
                <td>{{ $mensaje->user->role }}</td>
                <td>{{ $mensaje->fecha_mensaje }}</td>
                <td>{{ $mensaje->contenido }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#Ver{{ $mensaje->id }}">Ver</button>
                    <!-- Modal de Editar -->
                    <div class="modal fade text-dark" id="Ver{{ $mensaje->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmacion</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Seguro que desea continuar?</p>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-primary" role="link"
                                        href=" {{ action('MensajeController@detalle', ['id' => $mensaje->id]) }} "><span
                                            class="glyphicon glyphicon-edit"></span> Si</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Responder{{ $mensaje->user->id }}">Responder</button>
                    <!-- Modal -->
                    <div class="modal fade text-dark" id="Responder{{ $mensaje->user->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Nuevo Mensaje</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="GET" action="{{ route('mensaje_responder', ['id' => $mensaje->user->id]) }}">
                                        <div class="form-group">
                                            <label for="asunto" class="col-form-label">Asunto:</label>
                                            <input type="text" class="form-control" id="asunto" name="asunto">
                                        </div>
                                            <div class="form-group">
                                            <label for="contenido" class="col-form-label">Mensaje:</label>
                                            <textarea class="form-control" id="contenido" name="contenido"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" role="link">Enviar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#Eliminar{{ $mensaje->id }}">Eliminar</button>
                    <!-- Modal de Editar -->
                    <div class="modal fade text-dark" id="Eliminar{{ $mensaje->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmacion</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que desea continuar con la Eliminacion?
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-primary" role="link"
                                        href=" {{ action('MensajeController@eliminar', ['id' => $mensaje->id]) }} "><span
                                            class="glyphicon glyphicon-edit"></span> Si</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
    </table>
</div>
    <div class="clearfix"></div>
        {{$mensajes->links()}}
    </div>
</div>

@include('includes.footer')

@endsection

 <!-- Modal -->
 <div class="modal fade text-dark" id="Enviar{{ Auth::user()->id }}" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Enviar Mensaje</h5>
                 <button type="button" class="close" data-dismiss="modal">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="GET" action="{{ route('mensaje_enviar', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
                     <div class="form-group">
                         <select id="usuario" type="text" class="form-control" name="usuario">
                             <option selected="true" disabled>Seleccione el Usuario</option>

                             {{-- Sacamos los Usuarios --}}
                             <?php use App\User; ?>
                             {{ $users = User::all() }}
                             @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                    {{ $user->id }} - {{ $user->nombre }}</option>
                             @endforeach

                         </select>
                     </div>
                     <div class="form-group">
                         <label for="asunto" class="col-form-label">Asunto:</label>
                         <input type="text" class="form-control" id="asunto" name="asunto">
                     </div>
                     <div class="form-group">
                         <label for="contenido" class="col-form-label">Mensaje:</label>
                         <textarea class="form-control" id="contenido" name="contenido"></textarea>
                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-primary" role="link">Enviar</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal -->
