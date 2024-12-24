@extends('adminlte::page')

@section('content')
    <h1>Adicionar Banner</h1>
    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image">Imagem:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="title">Título:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
