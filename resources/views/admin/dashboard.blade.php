@extends('adminlte::page')

@section('title', 'Admin Dashboard')

{{-- Incluindo a Left Sidebar --}}
@section('sidebar')
    @include('vendor.adminlte.partials.sidebar.left-sidebar')
@stop

@section('content_header')
    <h1>Bem-vindo ao painel, {{ $user->name }}!</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Conteúdo Principal do Painel Admin</h3>
            <p>Seja bem-vindo ao painel administrativo. Use o menu lateral para navegar.</p>
        </div>
    </div>
@stop
