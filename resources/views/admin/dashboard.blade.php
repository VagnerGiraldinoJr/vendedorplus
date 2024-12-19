@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Bem-vindo ao painel, {{ $user->name }}!</h1>
@stop

@section('content')
    <div class="row">
        <!-- Exibindo o menu -->
        <div class="col-12">
            <ul class="nav">
                @foreach ($menu as $menuItem)
                    <li class="nav-item">
                        @if (isset($menuItem['url']) && isset($menuItem['icon']) && isset($menuItem['text']))  <!-- Verifica se as chaves 'url', 'icon' e 'text' existem -->
                        <a href="{{ url($menuItem['url']) }}" class="nav-link">
                            <i class="{{ $menuItem['icon'] }}"></i>
                            {{ $menuItem['text'] }}
                        </a>
                        @elseif (isset($menuItem['icon']) && isset($menuItem['text']))  <!-- Verifica se 'icon' e 'text' existem caso não haja 'url' -->
                        <span class="nav-link">
                                <i class="{{ $menuItem['icon'] }}"></i>
                                {{ $menuItem['text'] }}
                            </span>
                        @elseif (isset($menuItem['text']))  <!-- Verifica se apenas 'text' existe -->
                        <span class="nav-link">
                                {{ $menuItem['text'] }}
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
