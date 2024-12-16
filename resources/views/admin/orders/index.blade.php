@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Lista de Pedidos</h1>
@stop

@section('content')
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Novo Pedido</a>

    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->client->nome }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
