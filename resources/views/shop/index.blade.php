@extends('adminlte::page')

@section('title', 'Loja')

@section('content_header')

    @auth
        <h1>Bem-vindo à Loja {{ $user->role }}</h1>
    @else
        <h1>Bem-vindo à Loja</h1>
        <p>Por favor, faça login para ver seu papel.</p>
    @endauth

@stop

@section('content')
    <h1>Produtos Disponíveis</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p>{{ $product['description'] }}</p>
                        <p><strong>Preço:</strong> R$ {{ $product['price'] }}</p>
                        <a href="{{ route('product.show', $product['id']) }}" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
