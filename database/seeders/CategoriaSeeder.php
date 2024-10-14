<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['tag' => 'Nacional'],
            ['tag' => 'Internacional'],
            ['tag' => 'Deportes'],
            ['tag' => 'Espectáculos'],
        ]);

        // Categoria::create([
        //     ['tag' => 'Nacional'],
        //     ['tag' => 'Internacional'],
        //     ['tag' => 'Deportes'],
        //     ['tag' => 'Espectáculos'],
        // ]);
    }
}
