@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <h1>Lista de Incidencias</h1>
        <div class="table-responsive">

            @include('includes.message')

            <table class="table table-striped table-dark text-center">
                <div class="text-center">
                    <br>
                    <a class="btn btn-success text-center" href="{{ route('incidencia_crear')}}">Añadir Incidencia</a>
                    <a class="btn btn-success text-center" href="{{ route('incidencias_pdf')}}">Generar PDF</a>
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Nº Registros
                        </button>
                        <div class="dropdown-menu" x-placement="right-start"
                            style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item"
                                href="{{ action('IncidenciaController@getIncidencias', [$registros = 2]) }}">2</a>
                            <a class="dropdown-item"
                                href="{{ action('IncidenciaController@getIncidencias', [$registros = 5]) }}">5</a>
                            <a class="dropdown-item"
                                href="{{ action('IncidenciaController@getIncidencias', [$registros = 10]) }}">10</a>
                        </div>
                    </div>
                </div>
                <br>
                <tr class="">
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Fecha y Hora</th>
                    <th>Prioridad</th>
                    <th>Aula</th>
                    <th>Asunto</th>
                    <th>Descripcion</th>
                    <th></th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
                @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->user->id }}</td>
                    <td>{{ $incidencia->user->nick }}</td>
                    <td>{{ $incidencia->user->role }}</td>
                    <td>{{ $incidencia->fecha_incidencia }}</td>
                    <td>{{ $incidencia->prioridad }}</td>
                    <td>{{ $incidencia->aula }}</td>
                    <td>{{ $incidencia->asunto }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#Ver{{ $incidencia->id }}">Ver</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Ver{{ $incidencia->id }}" tabindex="-1" role="dialog">
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
                                            href=" {{ action('IncidenciaController@detalle', ['id' => $incidencia->id]) }} "><span
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
                            data-target="#Editar{{ $incidencia->id }}">Editar</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Editar{{ $incidencia->id }}" tabindex="-1" role="dialog">
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
                                            href=" {{ action('IncidenciaController@editar', ['id' => $incidencia->id]) }} "><span
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
                            data-target="#Eliminar{{ $incidencia->id }}">Eliminar</button>
                        <!-- Modal de Editar -->
                        <div class="modal fade text-dark" id="Eliminar{{ $incidencia->id }}" tabindex="-1"
                            role="dialog">
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
                                            href=" {{ action('IncidenciaController@eliminar', ['id' => $incidencia->id]) }} "><span
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
        {{$incidencias->links()}}
    </div>
</div>

@include('includes.footer')

@endsection
