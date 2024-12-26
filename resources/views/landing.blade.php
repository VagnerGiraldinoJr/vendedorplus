@extends('adminlte::page')

@section('title', 'Bem-vindo ao VendedorPLUS')

@section('content_header')
    <!-- ✅ Navbar Fixa no Topo -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🚀 VendedorPLUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beneficios">Benefícios</a>
                    </li>
                    @if(Auth::guard('client')->check())
                        <li class="nav-item">
                            <a class="nav-link btn btn-success text-white" href="{{ route('client.welcome') }}">🏠 Área do Cliente</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('client.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">🚪 Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('client.login') }}">🔑 Login Cliente</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

@endsection

@section('content')
    <!-- 🚀 Seção 1: Banner Dinâmico com Swiper.js -->
    <section class="mt-5 pt-3">
        <div class="swiper-container mb-5 shadow-sm rounded">
            <div class="swiper-wrapper">
                @forelse ($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $banner->image_path) }}" class="d-block w-100" alt="{{ $banner->alt_text }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $banner->title }}</h5>
                            <p>{{ $banner->alt_text }}</p>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <img src="{{ asset('images/default-banner.jpg') }}" class="d-block w-100" alt="Banner Padrão">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bem-vindo ao VendedorPLUS</h5>
                            <p>Otimize suas vendas agora mesmo!</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- ✅ Seção de Boas-Vindas -->
    <section class="text-center my-5">
        @if($user)
            <h2 class="fw-bold">👋 Bem-vindo, {{ $user->nome ?? $user->name }}!</h2>
            <p class="lead">Você está autenticado como <strong>{{ $guard === 'client' ? 'Cliente' : 'Usuário' }}</strong>.</p>
            <a href="{{ $guard === 'client' ? route('client.shop.index') : route('shop.index') }}" class="btn btn-success mt-3">🛍️ Ir para a Loja</a>
            <form action="{{ $guard === 'client' ? route('client.logout') : route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Logout</button>
            </form>
        @else
            <h2 class="fw-bold">🎯 Experimente Gratuitamente por 7 Dias</h2>
            <p class="lead">Teste todas as funcionalidades sem compromisso!</p>
            <a href="{{ route('clients.register') }}" class="btn btn-primary btn-lg mt-3">🚀 Cadastre-se Gratuitamente</a>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg mt-3 ms-2">🔑 Já tem uma conta? Faça Login</a>
        @endif
    </section>

    <!-- ✅ Seção de Benefícios -->
    <section id="beneficios" class="container text-center my-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm feature-card">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x text-primary"></i>
                        <h5 class="mt-3 fw-bold">📊 Relatórios Avançados</h5>
                        <p>Monitore seu desempenho com gráficos claros e intuitivos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm feature-card">
                    <div class="card-body">
                        <i class="fas fa-cogs fa-3x text-primary"></i>
                        <h5 class="mt-3 fw-bold">💼 Gestão Completa</h5>
                        <p>Controle tudo: vendas, clientes e estoque.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Botão Voltar ao Topo -->
    <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" class="btn btn-primary back-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>
@endsection

@section('css')
    .navbar .dropdown-menu { min-width: 200px; }
    .feature-card { transition: transform 0.3s ease; }
    .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    .back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
    display: none;
    }
    .back-to-top.show { display: block; }
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: { delay: 3000 },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        });
    </script>
@endsection
