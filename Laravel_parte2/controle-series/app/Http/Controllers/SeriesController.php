<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Temporada;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()->flash(
            'mensagem',
            "Série {$serie->id} e suas temporadas e episódios criados com sucesso {$serie->nome}"
        );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        $nomeSerie = $serie->nome;

        $serie->temporadas->each(function(Temporada $temporada)
        {
            $temporada->episodios()->each(function(Episodio $episodio)
            {
                $episodio->delete();
            });

            $temporada->delete();
        });

        $serie->delete();
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', "Série $nomeSerie removida com sucesso");

        return redirect()->route('listar_series');
    }
}
