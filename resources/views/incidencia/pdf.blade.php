<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center">Lista de Incidencias</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                   {{--  <th>Avatar</th> --}}
                    <th>Fecha</th>
                    <th>Prioridad</th>
                    <th>Aula</th>
                    <th>Asunto</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incidencias as $incidencia)
                <tr>
                    {{-- <td> 
                        @if($user->image)
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" width="50px" />
                        @else
                        <img src="{{ asset('img/default.png') }}" class="avatar" width="50px" />
                        @endif
                    </td> --}}
                    <td>{{ $incidencia->fecha_incidencia }}</td>
                    <td>{{ $incidencia->prioridad }}</td>
                    <td>{{ $incidencia->aula }}</td>
                    <td>{{ $incidencia->asunto }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>