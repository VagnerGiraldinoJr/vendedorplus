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
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Links dinâmicos baseados no papel do usuário -->

                @if(optional(Auth::user())->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>
                @endif

                @if(optional(Auth::user())->hasRole('user'))
                    <li>
                        <a href="{{ route('shop.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Dashboard</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
