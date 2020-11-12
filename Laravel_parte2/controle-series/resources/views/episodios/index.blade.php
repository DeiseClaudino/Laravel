@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
<form action="">
   <ul class="list-group">
      @foreach ($episodios as $episodio)
      <li class="list-group-item d-flex justify-content-between align-itens-center">
         Episódio {{ $episodio->numero }}
         <input type="checkbox">
      </li>
      @endforeach
   </ul>
   <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection
