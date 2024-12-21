@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    {{-- Feedback de Sucesso e Erro --}}
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif

    {{-- Botão Novo Cliente --}}
    <div class="mb-3">
        <a href="{{ route('admin.clients.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Novo Cliente
        </a>
    </div>

    {{-- Tabela de Clientes --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Clientes Cadastrados</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nome }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            {{-- Botão Editar --}}
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            {{-- Botão Excluir com Confirmação --}}
                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{-- Paginação --}}
            {{ $clients->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    <style>
        .btn-sm i {
            margin-right: 5px;
        }

        .alert {
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 5px;
        }
    </style>
@stop

@section('js')
    <script>
        function confirmDelete() {
            return confirm('Tem certeza que deseja excluir este cliente? Essa ação não pode ser desfeita.');
        }

        document.addEventListener('DOMContentLoaded', function () {
            console.log('Página de clientes carregada com sucesso!');
        });
    </script>
@stop
