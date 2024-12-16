<!-- resources/views/shop/show.blade.php -->
@extends('adminlte::page')

@section('title', $product->name)

@section('content_header')
    <h1>{{ $product->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                <a href="{{ route('shop.index') }}" class="btn btn-secondary">Voltar à Loja</a>
            </div>
        </div>
    </div>
@stop
