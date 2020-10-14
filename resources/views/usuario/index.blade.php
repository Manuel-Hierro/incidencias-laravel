<h1>Listado de Usuarios</h1>
<h3><a href="{{ action('UsuarioController@create') }}">Crear Usuario</a></h3>

@if(session('status'))
<p style="background: green; color: white;">
    {{session('status')}}
</p>
@endif

<ul>
@foreach($usuarios as $usuario)
<li>
<a href="{{ action('UsuarioController@detail', ['id' => $usuario->id])}}">
    {{$usuario->id}} -{{$usuario->nif}} - {{$usuario->nombre}} - {{$usuario->apellido1}}
</a>
</li>
@endforeach
</ul>


