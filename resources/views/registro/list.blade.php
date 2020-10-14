@extends('layouts.app')

@section('content')

<div class="">
    <div class="row justify-content-center">
        <h1>Lista de Registros</h1>   
    <div class="table-responsive">
    <table class="table table-striped table-dark text-center">
        <div class="text-center">
        </div>
        <br>
        <tr class="">            
            <th>ID</th>
            <th>NIF</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Username</th>
            <th>Perfil</th>
            <th>Email</th>
            <th>Fotografia</th>
            <th>Telefono</th>
            <th>Departamento</th>
            <th>Fecha</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($users as $user)
            <tr>                
                <td>{{ $user->id }}</td>
                <td>{{ $user->nif }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido1 }} {{ $user->apellido2 }}</td>
                <td>{{ $user->nick }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                @if($user->image)
                <td>
                    <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="imagen">
                </td>
                @endif
                <td>{{ $user->telefono }}</td>
                <td>{{ $user->departamento }}</td>
                <td>{{ $user->fecha }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ action('UserController@aceptar', ['id' => $user->id])}}"><span class="fas fa-check"></span> Aceptar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="{{ action('UserController@rechazar', ['id' => $user->id])}}"><span class="fas fa-times"></span> Rechazar</a>
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
