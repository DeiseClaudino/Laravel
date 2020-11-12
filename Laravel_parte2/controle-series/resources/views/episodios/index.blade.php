@extends('layout')
@section('conteudo')

    <ul class="list-group">
        @foreach ($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-itens-center">
            Episódio {{ $episodio->numero }}
        </li>
        @endforeach
    </ul>


@endsection
