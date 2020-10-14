<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center">Lista de Mensajes</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                   {{--  <th>Avatar</th> --}}
                   <th>Usuario</th>
                   <th>Perfil</th>
                   <th>Fecha y Hora</th>
                   <th>Contenido</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mensajes as $mensaje)
                <tr>
                    {{-- <td> 
                        @if($user->image)
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" width="50px" />
                        @else
                        <img src="{{ asset('img/default.png') }}" class="avatar" width="50px" />
                        @endif
                    </td> --}}
                    <td>{{ $mensaje->user->nick }}</td>
                    <td>{{ $mensaje->user->role }}</td>
                    <td>{{ $mensaje->fecha_mensaje }}</td>               
                    <td>{{ $mensaje->contenido }}</td>   
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>