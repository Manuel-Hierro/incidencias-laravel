@extends('layouts.app')

@section('content')

<div class="text-center">

    <div class="row justify-content-center">
        <div class="table-sm-responsive">
            <h1>Detalle de Incidencia</h1>
            @include('includes.message')

            <table class="table table-striped table-hover table-dark text-center">
                <div class="text-center">
                    <br>
                    {{-- <a class="btn btn-success text-center" href="{{ route('crear_user') }}">Añadir Usuario</a>
                    <a class="btn btn-success text-center" href="{{ route('users_pdf')}}">Generar PDF</a>
                    --}}
                </div>
                <br>
                <tr class="">
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Fecha y Hora</th>
                    <th>Prioridad</th>
                    <th>Aula</th>
                    <th>Asunto</th>
                    <th>Descripcion</th>
                </tr>
                <tr>
                    <td>{{ $incidencia->user->nick }}</td>
                    <td>{{ $incidencia->user->role }}</td>
                    <td>{{ $incidencia->fecha_incidencia }}</td>
                    <td>{{ $incidencia->prioridad }}</td>
                    <td>{{ $incidencia->aula }}</td>
                    <td>{{ $incidencia->asunto }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>

    </div>
</div>

@include('includes.footer')

@endsection
