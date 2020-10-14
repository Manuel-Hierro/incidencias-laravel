@extends('layouts.app')

@section('content')

<div class="text-center">

    <div class="row justify-content-center">

        <div class="table-responsive">
            <h1>Lista de Usuarios</h1>
            @include('includes.message')

            <table class="table table-striped table-hover table-dark text-center">
                <div class="text-center">
                    <br>
                    <a class="btn btn-success text-center" href="{{ route('crear_user') }}">Añadir Usuario</a>
                    <a class="btn btn-success text-center" href="{{ route('users_pdf')}}">Generar PDF</a>
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Nº Registros
                        </button>
                        <div class="dropdown-menu" x-placement="right-start"
                            style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item"
                                href="{{ action('UserController@getUsers', [$registros = 2]) }}">2</a>
                            <a class="dropdown-item"
                                href="{{ action('UserController@getUsers', [$registros = 5]) }}">5</a>
                            <a class="dropdown-item"
                                href="{{ action('UserController@getUsers', [$registros = 10]) }}">10</a>
                        </div>
                    </div>
                </div>
                <br>
                <tr class="">
                    <th>ID</th>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th></th>
                    <th>Nick</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Telefono</th>
                    <th>Departamento</th>
                    <th>Fecha</th>
                    <th></th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nif }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->apellido1 }}</td>
                    <td>{{ $user->apellido2 }}</td>
                    <td>{{ $user->nick }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    @if($user->image)
                    <td>
                        <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="imagen">
                    </td>
                    @else
                    <td></td>
                    @endif
                    <td>{{ $user->telefono }}</td>
                    <td>{{ $user->departamento }}</td>
                    <td>{{ $user->fecha }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#Responder{{ $user->id }}">Enviar</button>
                        <!-- Modal -->
                        <div class="modal fade text-dark" id="Responder{{ $user->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nuevo Mensaje</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="GET" action="{{ route('mensaje', ['id' => $user->id]) }}">
                                            <div class="form-group">
                                                <label for="asunto" class="col-form-label">Asunto:</label>
                                                <input type="text" class="form-control" id="asunto" name="asunto">
                                            </div>
                                            <div class="form-group">
                                                <label for="contenido" class="col-form-label">Mensaje:</label>
                                                <textarea class="form-control" id="contenido"
                                                    name="contenido"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    role="link">Enviar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cerrar</button>
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
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#Ver{{ $user->id }}">Ver</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Ver{{ $user->id }}" tabindex="-1" role="dialog">
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
                                            href=" {{ action('UserController@detalle', ['id' => $user->id]) }} "><span
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
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#Editar{{ $user->id }}">Editar</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Editar{{ $user->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirmacion</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea continuar con la Edicion?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-primary" role="link"
                                            href=" {{ action('UserController@editar', ['id' => $user->id]) }} "><span
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
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#Eliminar{{ $user->id }}">Eliminar</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Eliminar{{ $user->id }}" tabindex="-1" role="dialog">
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
                                            href=" {{ action('UserController@eliminar', ['id' => $user->id]) }} "><span
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
        {{$users->links()}}
    </div>
</div>

@include('includes.footer')

@endsection
