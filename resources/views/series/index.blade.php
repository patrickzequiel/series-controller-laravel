@extends('layout')

@section('cabecalho')
<div class="d-flex justify-content-between align-items-center">
    <div class="col">
        <h1>Series</h1>
    </div>
    <div class="col d-flex justify-content-center">
        <a href="series/criar" class="btn btn-dark mb-2">Adicionar</a>
    </div>
</div>
@endsection
@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<ul class="list-group">
    <?php foreach ($series as $series) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $series->nome }}

            <span class="d-flex">
                <a href="/series/{{ $series->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
            <form method="post" action="/series/{{ $series->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($series->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            </span>
        </li>
    <?php endforeach; ?>
</ul>
@endsection
