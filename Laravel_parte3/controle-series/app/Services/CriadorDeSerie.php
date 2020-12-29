<?php

namespace App\Services;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporada, int $epPorTemporada): Serie
    {
        $serie = null;

        DB::beginTransaction();

        $serie = Serie::create([
            'nome'  =>  $nomeSerie
        ]);

        $this->criaTemporadas($qtdTemporada, $epPorTemporada, $serie);

        DB::commit();

        return $serie;

    }

    public function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie)
    {
        for($i = 1; $i <= $qtdTemporadas; $i++)
        {
            $temporada = $serie->temporadas()->create([
                'numero'    =>  $i
            ]);

            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }

    public function criaEpisodios(int $epPorTemporada, Temporada $temporada)
    {
        for ($j = 1; $j <= $epPorTemporada; $j++)
        {
            $temporada->episodios()->create([
                'numero' => $j
            ]);
        }
    }
}
