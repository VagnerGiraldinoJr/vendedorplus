@extends('adminlte::page')

@section('title', 'Cadastro de Revendedora')

@section('content_header')
    <!-- ✅ Navbar Fixa no Topo -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">🚀 VendedorPLUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">🔑 Já tem uma conta? Faça Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <!-- 🚀 Formulário de Cadastro -->
    <section class="d-flex justify-content-center align-items-center mt-5 pt-5">
        <div class="card shadow-lg p-4 rounded" style="max-width: 500px; width: 100%;">
            <div class="card-header bg-primary text-white text-center rounded-top">
                <h3>🚀 Cadastre-se Gratuitamente</h3>
                <p class="mb-0">Experimente o VendedorPLUS por 7 dias grátis!</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf

                    <!-- Nome Completo -->
                    <div class="form-group mb-3">
                        <label for="nome">📝 Nome Completo</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">📧 E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
                    </div>

                    <!-- Celular -->
                    <div class="form-group mb-3">
                        <label for="celular">📱 Celular</label>
                        <input type="text" name="celular" class="form-control"
                               placeholder="Digite seu número de celular">
                    </div>

                    <!-- CPF -->
                    <div class="form-group mb-3">
                        <label for="cpf">🆔 CPF</label>
                        <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF">
                    </div>

                    <!-- Senha -->
                    <div class="form-group mb-3">
                        <label for="senha">🔑 Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="Digite sua senha"
                               required>
                    </div>

                    <!-- Confirmação de Senha -->
                    <div class="form-group mb-4">
                        <label for="senha_confirmation">🔄 Confirme sua Senha</label>
                        <input type="password" name="senha_confirmation" class="form-control"
                               placeholder="Confirme sua senha" required>
                    </div>

                    <!-- Botão de Cadastro -->
                    <button type="submit" class="btn btn-primary w-100">🚀 Cadastrar</button>
                </form>
            </div>

            <div class="card-footer text-center">
                <p class="mb-0">🔑 Já tem uma conta? <a href="{{ route('login') }}">Faça Login</a></p>
            </div>
        </div>
    </section>
@endsection

@section('css')
    body {
    background-color: #f9fafc;
    }

    .card {
    border-radius: 10px;
    }

    .card-header {
    font-size: 1.2rem;
    font-weight: bold;
    }

    .form-group label {
    font-weight: bold;
    }

    .form-control {
    border-radius: 5px;
    }

    .btn-primary {
    font-weight: bold;
    padding: 10px;
    }

    .card-footer {
    font-size: 0.9rem;
    }
@endsection

@section('js')
    <script>
        console.log('Página de cadastro carregada com sucesso!');
    </script>
@endsection
