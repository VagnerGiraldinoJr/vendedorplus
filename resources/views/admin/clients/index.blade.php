@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-success">Adicionar Cliente</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Clientes</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nome }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->celular }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
                <!-- Adicionar jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- jQuery Mask Plugin -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Aplicar máscara para CPF
                        $('.cpf').mask('000.000.000-00', { reverse: true });
                    });
                </script>


                </tbody>
            </table>
        </div>
    </div>
@endsection
