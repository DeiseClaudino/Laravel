<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriadorDeSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);

        $this->assertDatabaseHas('series', [
            'nome'  => $nomeSerie
        ]);

        $this->assertDatabaseHas('temporadas', [
            'serie_id'  =>  $serieCriada->id,
            'numero'    =>  1
        ]);

        $this->assertDatabaseHas('episodios', [
            'numero'    =>  1
        ]);
    }
}
