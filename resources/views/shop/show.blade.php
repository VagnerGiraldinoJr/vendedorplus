@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto</h1>
@endsection

@section('content')
    <h2>{{ $product['name'] }}</h2>
    <p>{{ $product['description'] }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($product['price'], 2, ',', '.') }}</p>
    <a href="{{ route('client.shop.index') }}" class="btn btn-primary">Voltar à Loja</a>
@endsection
