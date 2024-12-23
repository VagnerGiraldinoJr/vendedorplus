<!-- Left Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    <!-- Sidebar -->
    <div class="sidebar">

        <li>
            <a class="nav-link" onclick="document.body.classList.toggle('dark-mode')">
                <i class="fas fa-moon nav-icon"></i>

            </a>
        </li>


        <!-- Data e Hora -->
        <div class="d-flex align-items-center text-white my-3 border-bottom pb-2 pl-2">
            <div>
                <i class="fas fa-calendar text-info"></i>
                <span id="current-date">--/--/----</span>
            </div>
            <div class="ml-3">
                <i class="fas fa-clock text-warning"></i>
                <span id="current-time">--:--:--</span>
            </div>
        </div>

        <!-- Menu Dinâmico -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Links do Admin -->
                @if(optional(Auth::user())->hasRole('admin'))
                    <li class="nav-header text-uppercase text-light">Admin</li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
                            <p>Dashboard</p>
                        </a>
                        <a href="{{ route('admin.clients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tag text-success"></i>
                            <p>Clientes</p>
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cash-register text-danger"></i>
                            <p>Pedidos</p>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-gifts text-warning"></i>
                            <p>Produtos - Loja</p>
                        </a>
                    </li>
                @endif

                <!-- Links do Cliente -->
                @if(optional(Auth::user())->hasRole('user'))
                    <li class="nav-header text-uppercase text-light">Cliente</li>
                    <li>
                        <a href="{{ route('client.shop.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-store text-primary"></i>
                            <p>Loja</p>
                        </a>
                        <a href="{{ route('client.profile.edit') }}" class="nav-link">
                            <i class="nav-icon fas fa-user text-success"></i>
                            <p>Alterar Perfil</p>
                        </a>
                        <a href="{{ route('client.password.edit') }}" class="nav-link">
                            <i class="nav-icon fas fa-lock text-danger"></i>
                            <p>Alterar Senha</p>
                        </a>
                        <a href="{{ route('client.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-box text-info"></i>
                            <p>Meus Pedidos</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

        <!-- Suporte -->
        <div class="text-left text-white mt-4 border-top pt-3 pl-2">
            <h6>
                <i class="fab fa-whatsapp text-success"></i> Suporte
            </h6>
            <a href="https://wa.me/5511996190016" target="_blank" class="text-white">
                <i class="fab fa-whatsapp fa-lg text-success"></i> +55 11 99619-0016
            </a>
        </div>

        <!-- Informações do Sistema -->
        <div class="text-left text-white mt-4 border-top pt-3 pl-2">
            <h6>
                <i class="fas fa-code text-light"></i> Informações do Sistema
            </h6>
            <p>
                <i class="fab fa-laravel text-danger"></i> Laravel:
                <strong>{{ app()->version() }}</strong>
            </p>
            <p>
                <i class="fab fa-php text-info"></i> PHP:
                <strong>{{ PHP_VERSION }}</strong>
            </p>

        </div>
    </div>
</aside>

<!-- Script para Data e Hora -->
<script>
    function updateDateTime() {
        const timeElement = document.getElementById('current-time');
        const dateElement = document.getElementById('current-date');
        const now = new Date();

        const time = now.toLocaleTimeString('pt-BR');
        const date = now.toLocaleDateString('pt-BR');

        timeElement.textContent = time;
        dateElement.textContent = date;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
