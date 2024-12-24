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

        <!-- Dia da Semana, Data e Hora -->
        <div class="text-center text-white my-3 border-bottom pb-2">
            <h5 id="current-day" class="mb-1 font-weight-bold">Carregando...</h5>
            <div class="d-flex justify-content-around align-items-center">
                <div class="text-center">
                    <i class="fas fa-calendar text-info"></i>
                    <p id="current-date" class="mb-0">Carregando...</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-clock text-warning"></i>
                    <p id="current-time" class="mb-0">Carregando...</p>
                </div>
            </div>
        </div>

        <!-- Menu Dinâmico -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Links do Admin -->
                @if(optional(Auth::user())->hasRole('admin'))
                    <li class="nav-header text-uppercase text-light mt-2">📊 Administração</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.clients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tag text-success"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cash-register text-danger"></i>
                            <p>Pedidos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-gifts text-warning"></i>
                            <p>Produtos - Loja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banners.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-images text-info"></i>
                            <p>Gestão de Banners</p>
                        </a>
                    </li>
                @endif

                <!-- Links do Cliente -->
                @if(optional(Auth::user())->hasRole('user'))
                    <li class="nav-header text-uppercase text-light mt-3">🛒 Cliente</li>
                    <li class="nav-item">
                        <a href="{{ route('client.shop.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-store text-primary"></i>
                            <p>Loja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.profile.edit') }}" class="nav-link">
                            <i class="nav-icon fas fa-user text-success"></i>
                            <p>Alterar Perfil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.password.edit') }}" class="nav-link">
                            <i class="nav-icon fas fa-lock text-danger"></i>
                            <p>Alterar Senha</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-box text-info"></i>
                            <p>Meus Pedidos</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

        <!-- Suporte -->
        <div class="text-white mt-4 border-top pt-3 pl-2">
            <h6 class="text-uppercase mb-2"><i class="fab fa-whatsapp text-success"></i> Suporte</h6>
            <a href="https://wa.me/5511996190016" target="_blank" class="btn btn-success btn-block">
                <i class="fab fa-whatsapp"></i> Fale Conosco
            </a>
        </div>

        <!-- Informações do Sistema -->
        <div class="text-white mt-4 border-top pt-3 pl-2">
            <h6 class="text-uppercase mb-2"><i class="fas fa-info-circle text-light"></i> Informações do Sistema</h6>
            <p><i class="fab fa-laravel text-danger"></i> Laravel: <strong>{{ app()->version() }}</strong></p>
            <p><i class="fab fa-php text-info"></i> PHP: <strong>{{ PHP_VERSION }}</strong></p>
        </div>

        <!-- Botão Modo Escuro (Último Item) -->
        <div class="text-center mt-4 border-top pt-3">
            <button class="btn btn-outline-light btn-block" onclick="document.body.classList.toggle('dark-mode')">
                <i class="fas fa-moon"></i> Alternar Modo Escuro
            </button>
        </div>
    </div>
</aside>

---

## 🛠️ **JavaScript Atualizado**

```html
<script>
    function updateDateTime() {
        const timeElement = document.getElementById('current-time');
        const dateElement = document.getElementById('current-date');
        const dayElement = document.getElementById('current-day');
        const now = new Date();

        const daysOfWeek = [
            'Domingo', 'Segunda-feira', 'Terça-feira',
            'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'
        ];

        const day = daysOfWeek[now.getDay()];
        const time = now.toLocaleTimeString('pt-BR', { hour12: false });
        const date = now.toLocaleDateString('pt-BR');

        if (timeElement) timeElement.textContent = time;
        if (dateElement) dateElement.textContent = date;
        if (dayElement) dayElement.textContent = day;
    }

    // Atualiza a cada 1 segundo
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
