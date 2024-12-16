@extends('adminlte::page')

@section('title', 'Bem-vindo ao VendedorPlus')

@section('content_header')

        <h1>Bem-vindo à Loja</h1>


@endsection

@section('content')
    <div class="container">
        <!-- Sessão de Produtos -->
        <div class="row">
            <h2>Produtos em Destaque</h2>
            <!-- Aqui você pode listar os produtos -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto">
                    <div class="card-body">
                        <h5 class="card-title">Produto 1</h5>
                        <p class="card-text">Descrição do produto...</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
            <!-- Repita o bloco acima para outros produtos -->
        </div>

        <!-- Sessão de Login/Registro -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Já tem uma conta?</h2>
                <a href="{{ route('login') }}" class="btn btn-success btn-lg">Login</a>
            </div>
            <div class="col-md-6">
                <h2>Não tem conta?</h2>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registre-se</a>
            </div>
        </div>
    </div>
@endsection
