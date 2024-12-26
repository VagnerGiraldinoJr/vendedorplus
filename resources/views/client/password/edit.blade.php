<?php
@extends('layouts.app')

@section('content')
    <h1>🔑 Alterar Senha</h1>
    <form method="POST" action="{{ route('client.password.edit') }}">
        @csrf
        <input type="password" name="old_password" placeholder="Senha Atual">
        <input type="password" name="new_password" placeholder="Nova Senha">
        <button type="submit">Salvar</button>
    </form>
@endsection
