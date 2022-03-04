<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Services\CriadorDeSerie;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $series = serie::query()
            ->orderBy('nome')
            ->get();
            $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series','mensagem'));
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

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} e suas temporadas e episódios criados com sucesso {$serie->nome}"
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()
        ->flash(
            'mensagem',
            "Série removiada com sucesso"
            );

        echo "Série removida com sucesso";
        return redirect('/series');
    }
}
