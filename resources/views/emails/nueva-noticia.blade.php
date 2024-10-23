<x-mail::message>
# Nueva Noticia
 
## {{ $noticia->titulo }}
 
{{ $noticia->noticia }}

<x-mail::button :url="route('noticia.show', $noticia)">
Ver Noticia
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
