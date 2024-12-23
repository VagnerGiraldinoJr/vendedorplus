@extends('adminlte::page')

@section('title', 'Loja')

@section('content_header')
    <h1>Bem-vindo à Loja</h1>
@endsection

@section('content')
    <h1>Bem-vindo, {{ $user->name ?? 'Visitante' }}!</h1>
    <p>Explore nossos produtos!</p>

    <a href="{{ route('client.shop.index') }}" class="btn btn-primary">Ir para a Loja</a>
    <a href="{{ route('client.shop.show', ['id' => 1]) }}" class="btn btn-secondary">Ver Produto Exemplo</a>
@endsection
