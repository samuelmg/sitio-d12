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
