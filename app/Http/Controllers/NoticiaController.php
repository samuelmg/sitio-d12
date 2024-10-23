<?php

namespace App\Http\Controllers;

use App\Mail\NuevaNoticia;
use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class NoticiaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // 'auth',
            new Middleware('auth', except: ['index', 'show']),
            // new Middleware('subscribed', only: ['store']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        
        return view('noticias.index-noticias', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create-noticia', ['categorias' => Categoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([]);
        // Auth::user()->noticias()->create($request->all());
        
        $request->merge(['user_id' => Auth::id()]);
        $noticia = Noticia::create($request->all());

        $noticia->categorias()->attach($request->categorias);

        // $usuarios = User::pluck('email');
        // foreach ($usuarios as $usuario) {
            Mail::to(Auth::user()->email)->send(new NuevaNoticia($noticia));
        // }
        

        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show-noticia', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        Gate::authorize('update', $noticia);

        $categorias = Categoria::all();
        return view('noticias.edit-noticia', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        Gate::authorize('update', $noticia);
        
        $noticia->update($request->all());
        $noticia->categorias()->sync($request->categorias);

        return redirect()->route('noticia.show', $noticia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticia.index');
    }
}
