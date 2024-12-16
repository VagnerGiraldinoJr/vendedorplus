@extends('adminlte::page')

@section('title', 'Novo Pedido')

@section('content_header')
    <h1>Criar Novo Pedido</h1>
@stop

@section('content')
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client_id" class="form-control" required>
                <option value="">Selecione o Cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="aberto">Aberto</option>
                <option value="fechado">Fechado</option>
                <option value="pago">Pago</option>
            </select>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@stop
