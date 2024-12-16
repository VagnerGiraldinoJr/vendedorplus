<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Sidebar -->
    <aside class="main-sidebar">
        <div class="sidebar">
            <!-- User Info -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Itens Comuns para Todos os Usuários -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Loja</p>
                        </a>
                    </li>

                    <!-- Itens do Menu para Administradores -->
                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Painel Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.clients.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                    @endif

                    <!-- Itens do Menu para Usuários -->
                    @if(auth()->user()->hasRole('user'))
                        <li class="nav-item">
                            <a href="{{ route('shop.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Meus Pedidos</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
