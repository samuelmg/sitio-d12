<x-mi-layout titulo="Formulario de Contacto" :tipo-persona="$tipo_persona ?? ''">
    {{-- <h1> para {{ $tipo_persona }}</h1> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/contacto-recibe" method="POST">
        @csrf

        @if ($tipo_persona == 'cliente')
            <label for="no_cliente">Número de cliente:</label><br>
            <input type="text" name="no_cliente" id="no_cliente"><br>
        @endif

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="{{ old('correo') }}"><br>
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" cols="30" rows="4">{{ old('mensaje') }}</textarea><br>
        @error('mensaje')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Enviar">
    </form>
</x-mi-layout>