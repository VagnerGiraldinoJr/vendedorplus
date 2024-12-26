<?php
@extends('layouts.app')

@section('content')
    <h1>📝 Editar Perfil</h1>
    <form method="POST" action="{{ route('client.profile.edit') }}">
        @csrf
        <input type="text" name="nome" value="{{ Auth::guard('client')->user()->nome }}">
        <button type="submit">Salvar</button>
    </form>
@endsection
