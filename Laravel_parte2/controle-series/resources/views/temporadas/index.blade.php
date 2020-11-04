@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')

    <ul class="list-group">
        @foreach ($temporadas as $temporada)
        <li class="list-group-item">
            <a href="#">
                Temporada {{ $temporada->numero }}
            </a>
            <span class="badge badge-secondary">
                {{ $temporada->episodios->count() }}
            </span>
        </li>
        @endforeach


@endsection
