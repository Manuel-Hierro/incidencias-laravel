@if(isset($usuario) && is_object($usuario))
<h1>Editar Usuario</h1>
@else
<h1>Crear un Usuario</h1>
@endif



<form action="{{ isset($usuario) ? action('UsuarioController@update') : action('UsuarioController@save') }}" method="POST">

    {{ csrf_field() }}

    @if(isset($usuario) && is_object($usuario))
    <input type="hidden" name="id" value="{{ $usuario->id }}"/>
    @endif

    <label for="nif">NIF</label>
    <input type="text" name="nif" value="{{ isset($usuario) ? $usuario->nif : ''}}"/>
    </br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ isset($usuario) ? $usuario->nombre : ''}}"/>
    </br>
    <label for="apellido1">1º Apellido</label>
    <input type="text" name="apellido1" value="{{ isset($usuario) ? $usuario->apellido1 : ''}}"/>
    </br>
    <input type="submit" Value="Guardar"/>
</form>
