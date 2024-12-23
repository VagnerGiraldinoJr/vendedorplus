@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <h1>Adicionar Produto</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Novo Produto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Código do Produto -->
                <div class="form-group">
                    <label for="codigo_produto">Código do Produto</label>
                    <input type="text" name="codigo_produto" id="codigo_produto" class="form-control"
                           value="{{ old('codigo_produto') }}" required>
                    @error('codigo_produto')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nome do Produto -->
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" name="nome_produto" id="nome_produto" class="form-control"
                           value="{{ old('nome_produto') }}" required>
                    @error('nome_produto')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Preço -->
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" name="preco" id="preco" class="form-control"
                           value="{{ old('preco') }}" required>
                    @error('preco')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Preço Promocional -->
                <div class="form-group">
                    <label for="preco_promo">Preço Promocional</label>
                    <input type="number" step="0.01" name="preco_promo" id="preco_promo" class="form-control"
                           value="{{ old('preco_promo') }}">
                </div>

                <!-- Estoque -->
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" name="estoque" id="estoque" class="form-control"
                           value="{{ old('estoque') }}" required>
                    @error('estoque')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tamanho -->
                <div class="form-group">
                    <label for="tamanho">Tamanho</label>
                    <select name="tamanho" id="tamanho" class="form-control">
                        <option value="">Selecione...</option>
                        <option value="P" {{ old('tamanho') == 'P' ? 'selected' : '' }}>P</option>
                        <option value="M" {{ old('tamanho') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="G" {{ old('tamanho') == 'G' ? 'selected' : '' }}>G</option>
                        <option value="GG" {{ old('tamanho') == 'GG' ? 'selected' : '' }}>GG</option>
                        <option value="XG" {{ old('tamanho') == 'XG' ? 'selected' : '' }}>XG</option>
                    </select>
                </div>

                <!-- Cor -->
                <div class="form-group">
                    <label for="cor">Cor</label>
                    <input type="text" name="cor" id="cor" class="form-control"
                           value="{{ old('cor') }}">
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="ativo" {{ old('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="inativo" {{ old('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <!-- Imagem Principal -->
                <div class="form-group">
                    <label for="imagem_principal">Imagem Principal</label>
                    <input type="file" name="imagem_principal" id="imagem_principal" class="form-control-file">
                    @error('imagem_principal')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Imagem Thumbnail -->
                <div class="form-group">
                    <label for="imagem_thumbnail">Imagem Thumbnail</label>
                    <input type="file" name="imagem_thumbnail" id="imagem_thumbnail" class="form-control-file">
                    @error('imagem_thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Salvar Produto</button>
            </form>
        </div>
    </div>
@endsection
