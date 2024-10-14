<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'titulo', 'noticia', 'fecha'];
    
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
