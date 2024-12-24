@extends('adminlte::page')

@section('title', 'Editar Banner')

@section('content_header')
    <h1>Editar Banner</h1>
@stop

@section('content')
    {{-- Feedback de Sucesso e Erro --}}
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif

    {{-- Formulário de Edição --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Informações do Banner</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Título --}}
                <div class="form-group mb-3">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title', $banner->title) }}" placeholder="Digite o título do banner">
                </div>

                {{-- Texto Alternativo --}}
                <div class="form-group mb-3">
                    <label for="alt_text">Texto Alternativo (Alt Text)</label>
                    <input type="text" name="alt_text" id="alt_text" class="form-control"
                           value="{{ old('alt_text', $banner->alt_text) }}" placeholder="Texto alternativo para acessibilidade">
                </div>

                {{-- Imagem Atual --}}
                <div class="form-group mb-3">
                    <label>Imagem Atual</label>
                    <div>
                        <img src="{{ asset('storage/' . $banner->image_path) }}" width="200" alt="{{ $banner->alt_text }}" class="img-thumbnail">
                    </div>
                </div>

                {{-- Nova Imagem --}}
                <div class="form-group mb-3">
                    <label for="image">Nova Imagem (opcional)</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <small class="text-muted">Deixe vazio se não quiser alterar a imagem.</small>
                </div>

                {{-- Botões --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                    <a href="{{ route('banners.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    .img-thumbnail {
    max-height: 150px;
    margin-top: 10px;
    }
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Página de edição de banner carregada com sucesso!');
        });
    </script>
@stop
