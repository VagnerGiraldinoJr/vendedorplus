@extends('adminlte::page')

@section('title', 'Meus Pedidos')

@section('content_header')
    <h1>Meus Pedidos</h1>
@stop

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Total</th>
                <th>Data</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
