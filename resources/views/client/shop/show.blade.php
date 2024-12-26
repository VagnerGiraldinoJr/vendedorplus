@extends('layouts.app')

@section('title', $product->nome_produto)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->imagem_principal }}" class="img-fluid rounded shadow" alt="{{ $product->nome_produto }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->nome_produto }}</h1>
                <p class="text-muted">{{ $product->descricao }}</p>
                <p><strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
                @if ($product->preco_promo)
                    <p><strong>Promoção:</strong> R$ {{ number_format($product->preco_promo, 2, ',', '.') }}</p>
                @endif
                <p><strong>Estoque:</strong> {{ $product->estoque }} unidades disponíveis</p>
                <a href="#" class="btn btn-success btn-lg mt-3"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
            </div>
        </div>
        <a href="{{ route('client.shop.index') }}" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left"></i> Voltar para Loja</a>
    </div>
@endsection
