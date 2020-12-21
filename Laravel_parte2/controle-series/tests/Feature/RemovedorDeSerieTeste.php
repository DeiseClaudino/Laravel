<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeSerieTeste extends TestCase
{
    use RefreshDatabase;

    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie(
            'Nome da série',
            1,
            1
        );
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series',
    [
        'id'    =>  $this->serie->id
    ]);
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da série', $this->serie->nome);
        $this->assertDatabaseMissing('series',
        [
            'id'    =>  $this->serie->id
        ]);
    }
}
