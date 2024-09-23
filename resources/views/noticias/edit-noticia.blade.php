<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Noticias</title>
</head>
<body>
    <h1>Editar noticia</h1>

    <form action="{{ route('noticia.update', $noticia) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="titulo">Titulo:</label><br>
        <input
            type="text"
            name="titulo"
            value="{{ old('titulo') ?? $noticia->titulo }}"
        >
        <br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') ?? $noticia->fecha }}">

        <label for="noticia">Noticia:</label><br>
        <textarea name="noticia" cols="30" rows="4">{{ old('noticia') ?? $noticia->noticia }}</textarea><br>

        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria">
            <option value="Deportes" @selected($noticia->categoria == 'Deportes')>Deportes</option>
            <option value="Nacional" @selected($noticia->categoria == 'Nacional')>Nacional</option>
            <option value="Internacional" @selected($noticia->categoria == 'Internacional')>Internacional</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>