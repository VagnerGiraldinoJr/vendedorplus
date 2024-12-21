@extends('adminlte::page')

@section('title', 'Publico')

@section('content_header')
    <h1>Bem-vindo ao painel  {{ $user->name }}!</h1>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a>
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Gerenciar Pedidos</p>
                </a>
            </li>


    </ul>
@stop

@section('content')


@stop
