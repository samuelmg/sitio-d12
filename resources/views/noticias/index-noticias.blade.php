<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Noticias</h1>

    <p>
        <a href="{{ route('noticia.create') }}">Agregar Noticia</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Categoria</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
            <tr>
                <td>{{ $noticia->id }}</td>
                <td>
                    <a href="{{ route('noticia.show', $noticia) }}">
                        {{ $noticia->titulo }}
                    </a>
                </td>
                <td>{{ $noticia->fecha->diffForHumans() }}</td>
                <td>
                    @foreach ($noticia->categorias as $categoria)
                        {{ $categoria->tag }},
                    @endforeach
                </td>
                <td>{{ $noticia->user->name }}</td>
                <td>
                    @can('update', $noticia)
                        <a href="{{ route('noticia.edit', $noticia) }}">Editar</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>