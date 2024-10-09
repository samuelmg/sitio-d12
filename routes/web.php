<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto/{tipo_persona?}', [ContactoController::class, 'formulario']);
Route::post('/contacto-recibe', [ContactoController::class, 'newContact']);
Route::get('lista', [ContactoController::class, 'lista']);

Route::resource('noticia', NoticiaController::class)->parameters([
    'noticia' => 'noticia'
]);
//->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('tema', function () {
    return view('tema');
});
