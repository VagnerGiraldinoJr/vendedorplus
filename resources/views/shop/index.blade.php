@extends('layouts.app')

@section('title', 'Loja de Produtos')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">🛍️ Loja de Produtos</h1>
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->imagem_principal }}" class="card-img-top" alt="{{ $product->nome_produto }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->nome_produto }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($product->descricao, 60) }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($product->preco, 2, ',', '.') }}</strong></p>
                            <div class="mt-auto">
                                <a href="{{ route('client.shop.show', $product->id) }}" class="btn btn-primary btn-sm btn-block">
                                    <i class="fas fa-eye"></i> Ver Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Nenhum produto disponível no momento.</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
