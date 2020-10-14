<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center">Lista de Logs</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Fecha y Hora</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->user->nick }}</td>
                    <td>{{ $log->user->role }}</td>
                    <td>{{ $log->fecha_log }}</td>      
                    <td>{{ $log->accion }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>