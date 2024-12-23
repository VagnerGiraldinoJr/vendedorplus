@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>Editar Produto</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Produto: {{ $product->nome_produto }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Código do Produto -->
                <div class="form-group">
                    <label for="codigo_produto">Código do Produto</label>
                    <input type="text" name="codigo_produto" id="codigo_produto" class="form-control"
                           value="{{ old('codigo_produto', $product->codigo_produto) }}" required>
                </div>

                <!-- Nome do Produto -->
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" name="nome_produto" id="nome_produto" class="form-control"
                           value="{{ old('nome_produto', $product->nome_produto) }}" required>
                </div>

                <!-- Preço -->
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" name="preco" id="preco" class="form-control"
                           value="{{ old('preco', $product->preco) }}" required>
                </div>

                <!-- Estoque -->
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" name="estoque" id="estoque" class="form-control"
                           value="{{ old('estoque', $product->estoque) }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="ativo" {{ $product->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="inativo" {{ $product->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <!-- Imagem Principal -->
                <div class="form-group">
                    <label for="imagem_principal">Imagem Principal</label>
                    <input type="file" name="imagem_principal" id="imagem_principal" class="form-control-file">
                    @if ($product->imagem_principal)
                        <img src="{{ asset('storage/' . $product->imagem_principal) }}" alt="Imagem Atual"
                             class="img-thumbnail mt-2" width="150">
                    @endif
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control"
                              rows="4">{{ old('descricao', $product->descricao) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
            </form>
        </div>
    </div>
@endsection
