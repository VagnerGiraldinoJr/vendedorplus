@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <h1>Criar Novo Produto</h1>
@endsection

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo_produto">Código do Produto</label>
            <input type="text" class="form-control" name="codigo_produto" id="codigo_produto" required>
        </div>
        <div class="form-group">
            <label for="nome_produto">Nome do Produto</label>
            <input type="text" class="form-control" name="nome_produto" id="nome_produto" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" class="form-control" name="estoque" id="estoque">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
