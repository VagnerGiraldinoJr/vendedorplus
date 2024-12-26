@extends('layouts.auth') {{-- Use um layout específico para páginas de autenticação --}}

@section('title', 'Login Cliente')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>🔑 Login Cliente</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Senha</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="text-decoration-none">← Voltar à Página Inicial</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
