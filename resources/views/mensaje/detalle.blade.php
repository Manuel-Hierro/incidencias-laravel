@extends('layouts.app')

@section('content')

<div class="text-center">

    <div class="row justify-content-center">
        <div class="table-sm-responsive">
            <h1>Detalle de Mensaje</h1>
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
                <th>Perfil</th>
                <th>Fecha y Hora</th>
                <th>Contenido</th>
                </tr>
                <tr>
                    <td>{{ $mensaje->user->nick }}</td>
                    <td>{{ $mensaje->user->role }}</td>
                    <td>{{ $mensaje->fecha_mensaje }}</td>
                    <td>{{ $mensaje->contenido }}</td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>

    </div>
</div>

@include('includes.footer')

@endsection
