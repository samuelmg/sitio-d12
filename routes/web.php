<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function() {
    return view('formulario-contacto');
});

Route::post('/contacto-recibe', function(Request $request) {
    dd($request->all(), $request->nombre);
});
