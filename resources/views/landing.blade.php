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
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="{{ route('login') }}">🔑 Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')

    <!-- 🚀 Seção 1: Banner Dinâmico -->
    <section class="mt-5 pt-3">
        <div id="bannerCarousel" class="carousel slide mb-5 shadow-sm rounded" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @forelse ($banners as $index => $banner)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $banner->image_path) }}" class="d-block w-100" alt="{{ $banner->alt_text }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $banner->title }}</h5>
                            <p>{{ $banner->alt_text }}</p>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="{{ asset('images/default-banner.jpg') }}" class="d-block w-100" alt="Banner Padrão">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bem-vindo ao VendedorPLUS</h5>
                            <p>Otimize suas vendas agora mesmo!</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- ✅ Seção 2: Proposta de Valor -->
    <section class="text-center my-5">
        <h2 class="fw-bold">💼 Simplifique suas Vendas e Maximize seus Lucros</h2>
        <p class="lead">Com o <strong>VendedorPLUS</strong>, você tem controle total do seu negócio na palma da mão.</p>
        <a href="{{ route('clients.register') }}" class="btn btn-primary btn-lg mt-3">🚀 Cadastre-se Gratuitamente</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg mt-3 ms-2">🔑 Já tem uma conta? Faça Login</a>
    </section>

    <!-- ✅ Seção 3: Benefícios Aprimorados -->
    <section id="beneficios" class="container text-center my-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow-sm feature-card">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="mt-3">📊 Relatórios Avançados</h5>
                        <p>Monitore seu desempenho com gráficos claros e intuitivos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm feature-card">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h5 class="mt-3">💼 Gestão Completa</h5>
                        <p>Controle tudo: vendas, clientes e estoque, com eficiência.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm feature-card">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="mt-3">📱 Interface Responsiva</h5>
                        <p>Acesse a plataforma de qualquer dispositivo com facilidade.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm feature-card">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5 class="mt-3">📣 Suporte 24/7</h5>
                        <p>Atendimento rápido e suporte em tempo real.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        /* ✅ Ocultar content-header apenas nesta página */
        .content-header {
            display: none !important;
        }

        /* ✅ Ajuste do Banner */
        #bannerCarousel {
            margin-top: 0 !important;
        }

        .carousel-inner img {
            max-height: 400px;
            object-fit: cover;
        }

        /* ✅ Estilização dos Cards */
        .card {
            border-radius: 10px;
        }

        .feature-card {
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: #4e73df;
        }

        .btn-primary, .btn-success {
            font-weight: bold;
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Landing Page carregada com sucesso!');
    </script>
@endsection
