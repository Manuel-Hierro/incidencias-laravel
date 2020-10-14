<h1>{{$usuario->nombre}}</h1>

<p>
    {{$usuario->nif}} - {{$usuario->nombre}} - {{$usuario->apellido1}}
</p>

<a href="{{ action('UsuarioController@delete', ['id' => $usuario->id]) }}">Eliminar</a>
<a href="{{ action('UsuarioController@edit', ['id' => $usuario->id]) }}">Actualizar</a>
