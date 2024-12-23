@extends('adminlte::page')

@section('title', 'Dashboard Cliente')

{{-- Topo com Notificações, Perfil, Logout --}}
@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard Cliente</h1>
        <div class="d-flex align-items-center">
            <!-- Notificações -->
            <div class="mr-3">
                <a href="#" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-bell"></i> <span class="badge badge-warning">3</span>
                </a>
            </div>
            <!-- Perfil -->
            <div class="mr-3">
                <a href="{{ route('client.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-user"></i> Perfil
                </a>
            </div>
            <!-- Logout -->
            <div>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- Cards com Índices Importantes --}}
@section('content')
    <div class="row">
        <!-- Card 1: Pedidos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Novos Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        <!-- Card 2: Usuários -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Taxa de Conversão</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
        <!-- Card 3: Novos Usuários -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Novos Usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <!-- Card 4: Alertas Críticos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Alertas Críticos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de Desempenho -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="fas fa-chart-area"></i> Relatório de Desempenho</h3>
        </div>
        <div class="card-body">
            <canvas id="salesChart" style="height: 300px;"></canvas>
        </div>
    </div>

    <!-- Produtos em Destaque -->
    <div class="card card-solid mt-4">
        <div class="card-header bg-success text-white">
            <h5><i class="fas fa-gift"></i> Produtos em Destaque</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $product->imagem_principal }}" class="card-img-top"
                                 alt="{{ $product->nome_produto }}" style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nome_produto }}</h5>
                                <p>{{ Str::limit($product->descricao, 50) }}</p>
                                <p class="font-weight-bold text-success">
                                    R$ {{ number_format($product->preco, 2, ',', '.') }}
                                </p>
                                <a href="{{ route('client.shop.show', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Ver Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Nenhum produto disponível no momento.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

{{-- Footer --}}
@section('footer')
    <footer class="text-center text-muted mt-4">
        <p>Copyright © 2024 <a href="#">VendedorPLUS</a>. Todos os direitos reservados.</p>
    </footer>
@endsection

{{-- JavaScript --}}
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Vendas',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    data: [10, 20, 30, 40, 50, 60]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection

{{-- Right Sidebar --}}
@section('right_sidebar')
    <h5 class="text-white mt-3">Configurações</h5>
    <p class="text-white">Modo Dark/Light</p>
    <a href="#" class="btn btn-outline-light btn-block"
       onclick="document.body.classList.toggle('dark-mode')">
        <i class="fas fa-moon"></i> Alternar Tema
    </a>
@endsection
