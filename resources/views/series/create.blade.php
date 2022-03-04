@extends('layout')

@section('cabecalho')
<div class="row justify-content-md-center">
    <div class="col">
        <h1>Adicionar Serie</h1>
    </div>
</div>
@endsection
@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="post">
        <div class="d-flex justify-content-between align-items-center">
            @csrf
            <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2">
            <label for="qtd_temporadas">Nº temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>

        <div class="col col-2">
            <label for="ep_por_temporada">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>
            <button class="btn btn-primary me-md-2">Adicionar</button>

        </div>
    </form>
    @endsection
