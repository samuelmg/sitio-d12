<?php

namespace Tests\Feature;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoticiaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_muestra_listado_noticias(): void
    {
        $noticias = Noticia::factory(5)->create();

        $response = $this->get('/noticia');
        $response->assertStatus(200);
        $response->assertSee('Noticias')
            ->assertSee($noticias->last()->titulo);
    }

    public function test_crear_noticia()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $noticia = Noticia::factory()->make();

        $response = $this->actingAs($user)->post(route('noticia.store'), $noticia->toArray());
        $response->assertRedirect(route('noticia.index'));

        $this->assertDatabaseHas('noticias', [
            'titulo' => $noticia->titulo
        ]);
    }
}
