<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_original', 'ruta', 'noticia_id'];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }
}
