@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bem-vindo, Cliente!</h2>
        <p>Você está autenticado como cliente.</p>
        <a href="{{ route('client.logout') }}" class="btn btn-danger">Logout</a>
    </div>
@endsection
