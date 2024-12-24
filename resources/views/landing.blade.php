@extends('adminlte::page')

@section('title', 'Bem-vindo ao VendedorPLUS')

@section('content_header')
    <h1 class="text-center">Bem-vindo ao VendedorPLUS</h1>
@endsection

@section('content')
    <div class="container">
        <!-- Carrossel -->
        <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner rounded shadow-lg">
                <div class="carousel-item active">
                    <img src="{{ asset('public/images/banner1.jpg') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="Banner 2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- Apresentação do Projeto -->
        <section class="text-center mb-5">
            <h2 class="fw-bold">Gerencie Suas Vendas com Facilidade</h2>
            <p class="lead">O <strong>VendedorPLUS</strong> oferece as melhores ferramentas para otimizar suas vendas porta a porta.</p>
        </section>

        <!-- Cartões Informativos -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Relatórios Detalhados</h5>
                        <p class="card-text">Acompanhe suas vendas com gráficos e estatísticas em tempo real.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Facilidade de Uso</h5>
                        <p class="card-text">Interface intuitiva para facilitar o dia a dia dos vendedores.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Suporte 24/7</h5>
                        <p class="card-text">Conte com nossa equipe para tirar suas dúvidas a qualquer momento.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulário de Login -->
        <section class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white text-center">
                <h3>Faça Login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('css')
    <style>
        /* Ajustes personalizados */
        .carousel-inner img {
            max-height: 400px;
            object-fit: cover;
        }
        .card {
            border-radius: 10px;
        }
        .btn-primary {
            font-weight: bold;
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Página inicial carregada com sucesso!');
    </script>
@endsection
