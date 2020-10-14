@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <h1>Lista de Logs</h1>
    <div class="table-responsive">
    <table class="table table-striped table-dark text-center">
        <div class="text-center">
        <br>
            <a class="btn btn-success text-center" href="{{ route('logs_pdf')}}">Generar PDF</a>
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Nº Registros
                </button>
                <div class="dropdown-menu" x-placement="right-start"
                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item"
                        href="{{ action('LogController@logs', [$registros = 2]) }}">2</a>
                    <a class="dropdown-item"
                        href="{{ action('LogController@logs', [$registros = 5]) }}">5</a>
                    <a class="dropdown-item"
                        href="{{ action('LogController@logs', [$registros = 10]) }}">10</a>
                </div>
            </div>
        </div>
        <br>
        <tr class="">
            <th>Id</th>
            <th>Usuario</th>
            <th>Perfil</th>
            <th>Fecha y Hora</th>
            <th>Accion</th>
        </tr>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->user->id }}</td>
                <td>{{ $log->user->nick }}</td>
                <td>{{ $log->user->role }}</td>
                <td>{{ $log->fecha_log }}</td>
                <td>{{ $log->accion }}</td>
            </tr>
            @endforeach
    </table>
</div>
    <div class="clearfix"></div>
        {{$logs->links()}}
    </div>
</div>

@include('includes.footer')

@endsection
