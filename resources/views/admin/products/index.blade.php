@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Gerenciar Produtos</h1>
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Novo Produto</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->codigo_produto }}</td>
                <td>{{ $product->nome_produto }}</td>
                <td>{{ $product->preco }}</td>
                <td>{{ $product->estoque }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
