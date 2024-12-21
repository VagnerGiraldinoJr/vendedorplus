@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Cliente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control"
                           value="{{ old('nome', $client->nome) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', $client->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control"
                           value="{{ old('celular', $client->celular) }}">
                </div>

                <div class="form-group">
                    <label for="senha">Senha (deixe em branco para manter a atual)</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>

        </div>
    </div>
@endsection
