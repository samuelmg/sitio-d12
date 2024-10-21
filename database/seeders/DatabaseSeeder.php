<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;
use Database\Factories\CategoriaFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()->withPersonalTeam()
            ->has(Noticia::factory()->has(Categoria::factory()->count(3))->count(5))
            ->create([
                'name' => 'Test User',
                'email' => 'usuario@test.com',
            ]);

        // Noticia::factory(3)->create();

        User::factory(4)
            ->has(Noticia::factory()->has(Categoria::factory()->count(3))->count(5))
            ->create();

        $this->call([
            CategoriaSeeder::class,
        ]);
    }
}
