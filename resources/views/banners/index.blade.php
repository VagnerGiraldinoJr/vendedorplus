@extends('adminlte::page')

@section('title', 'Gerenciar Banners')

@section('content_header')
    <h1>Lista de Banners</h1>
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

    {{-- Botão Novo Banner --}}
    <div class="mb-3">
        <a href="{{ route('banners.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Novo Banner
        </a>
    </div>

    {{-- Tabela de Banners --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Banners Cadastrados</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $banner->image_path) }}" width="100" alt="{{ $banner->alt_text }}" class="img-thumbnail">
                        </td>
                        <td>{{ $banner->title ?? 'Sem título' }}</td>
                        <td>
                            {{-- Botão Visualizar --}}
                            <button class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#bannerModal"
                                    onclick="showBanner('{{ asset('storage/' . $banner->image_path) }}', '{{ $banner->title }}')">
                                <i class="fas fa-eye"></i> Visualizar
                            </button>

                            {{-- Botão Editar --}}
                            <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            {{-- Botão Excluir --}}
                            <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum banner encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{-- Paginação --}}
            {{ $banners->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <!-- Modal de Visualização -->
    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerModalLabel">Visualizar Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="bannerImage" src="" class="img-fluid" alt="Banner">
                    <h5 id="bannerTitle" class="mt-3"></h5>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    .btn-sm i {
    margin-right: 5px;
    }

    .alert {
    display: flex;
    align-items: center;
    }

    .alert i {
    margin-right: 5px;
    }

    .img-thumbnail {
    max-height: 80px;
    }
@stop

@section('js')
    <script>
        /**
         * Exibe o banner no modal com título e imagem
         * @param {string} imageUrl - URL da imagem do banner
         * @param {string} title - Título do banner
         */
        function showBanner(imageUrl, title) {
            console.log('Imagem URL:', imageUrl); // Log para depuração

            const bannerImage = document.getElementById('bannerImage');
            const bannerTitle = document.getElementById('bannerTitle');
            const modalElement = document.getElementById('bannerModal');

            if (bannerImage && bannerTitle && modalElement) {
                bannerImage.src = imageUrl;
                bannerTitle.innerText = title;

                // Garantir que o modal é exibido corretamente
                const modal = new bootstrap.Modal(modalElement, {
                    keyboard: true,
                    focus: true,
                    backdrop: 'static'
                });

                modal.show();
            } else {
                console.error('Elementos do modal não foram encontrados.');
            }
        }

        /**
         * Confirmação para exclusão de banners
         */
        function confirmDelete() {
            return confirm('Tem certeza que deseja excluir este banner? Essa ação não pode ser desfeita.');
        }

        document.addEventListener('DOMContentLoaded', function () {
            console.log('Página de banners carregada com sucesso!');
        });
    </script>
@stop
