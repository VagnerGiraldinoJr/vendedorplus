@extends('adminlte::page')

@section('title', 'Bem-vindo ao VendedorPlus')

@section('content_header')
    <h1>Bem-vindo ao VendedorPlus PUBLICO</h1>
@endsection


@section('content')
    <div class="container mt-4">
        <!-- Banner ou Mensagem de Boas-Vindas -->
        <div class="row mb-4 text-center">
            <div class="col">
                <h1 class="display-4">Bem-vindo ao VendedorPlus</h1>
                <p class="lead">Encontre os melhores produtos para você!</p>
            </div>
        </div>

        <!-- Sessão de Produtos -->
        <div class="row mb-4">
            <h2 class="col-12 mb-3">Produtos em DESTAAAA</h2>
            <!-- Card de Produto -->
            @for($i = 1; $i <= 6; $i++) <!-- Exemplo para múltiplos produtos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produto {{ $i }}">
                    <div class="card-body">
                        <h5 class="card-title">Produto {{ $i }}</h5>
                        <p class="card-text">Descrição breve do Produto {{ $i }}.</p>
                        <a href="#" class="btn btn-primary btn-block">Comprar</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Sessão de Categorias -->
        <div class="row mb-4">
            <h2 class="col-12 mb-3">Categorias</h2>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Roupas</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">Ver Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Perfumes</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">Ver Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Acessórios</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">Ver Mais</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sessão de Login/Registro -->
        <div class="row text-center mt-5">
            <div class="col-md-6 mb-3">
                <h2>Já tem uma conta?</h2>
                <a href="{{ route('login') }}" class="btn btn-success btn-lg btn-block">Login</a>
            </div>
            <div class="col-md-6">
                <h2>Não tem conta?</h2>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block">Registre-se</a>
            </div>
        </div>

    </div>
@endsection

