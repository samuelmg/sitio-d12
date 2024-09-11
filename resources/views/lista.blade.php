<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Mensajes</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Mensaje</th>
        </tr>
        @foreach ($mensajes as $mensaje)
            <tr>
                <td>{{ $mensaje->id }}</td>
                <td>{{ $mensaje->nombre }}</td>
                <td>{{ $mensaje->correo }}</td>
                <td>{{ $mensaje->mensaje }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>