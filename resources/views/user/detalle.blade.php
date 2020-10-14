@extends('layouts.app')

@section('content')

<div class="text-center">

    <div class="row justify-content-center">
        <div class="table-sm-responsive">
            <h1>Detalle de Usuario</h1>
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
                </tr>
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
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>

    </div>
</div>

@include('includes.footer')

@endsection
