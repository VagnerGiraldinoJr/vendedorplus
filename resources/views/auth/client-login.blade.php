<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Login do Cliente</h2>
        <form action="{{ route('client.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
@endsection
