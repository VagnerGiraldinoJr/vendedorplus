@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <h1>Lista de Produtos</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produtos Cadastrados</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Novo Produto
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover text-nowrap">
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
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->codigo_produto }}</td>
                        <td>{{ $product->nome_produto }}</td>
                        <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                        <td>{{ $product->estoque }}</td>
                        <td>
                                <span class="badge {{ $product->status === 'ativo' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                  style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum produto encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $products->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
