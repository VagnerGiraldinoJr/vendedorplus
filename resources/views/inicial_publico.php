@extends('adminlte::page')

@section('title', 'Bem-vindo ao VendedorPlus')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">

    <div class="mt-2">
        <h1>E-commerce</h1>
        {{--            <ol class="breadcrumb float-sm-right">--}}
            {{--                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
            {{--                <li class="breadcrumb-item active">E-commerce</li>--}}
            {{--            </ol>--}}
    </div>
</div>

<div class="mt-2">


    <a href="{{ route('login') }}" class="btn btn-success btn-sm mr-2">Login</a>
    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Registre-se</a>

</div>

@endsection

@section('content')
<div class="container-fluid">
    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <!-- Imagem do Produto -->
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{ asset('vendor/adminlte/dist/img/prod-1.jpg') }}"
                                 class="product-image"
                                 alt="Imagem do Produto">
                        </div>
                        <div class="col-12 product-image-thumbs mt-3">
                            <div class="product-image-thumb active"><img
                                    src="{{ asset('vendor/adminlte/dist/img/prod-1.jpg') }}" alt="Imagem">
                            </div>
                            <div class="product-image-thumb"><img
                                    src="{{ asset('vendor/adminlte/dist/img/prod-1.jpg') }}" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <!-- Detalhes do Produto -->
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots</h3>
                        <p>Descrição do produto aqui. Inclua informações importantes sobre o item.</p>

                        <hr>
                        <h4>Opções Disponíveis</h4>
                        <div class="d-flex flex-wrap">
                            <div class="btn-group btn-group-toggle mr-3" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" autocomplete="off" checked>
                                    Verde<br>
                                    <i class="fas fa-circle text-green"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" autocomplete="off">
                                    Azul<br>
                                    <i class="fas fa-circle text-blue"></i>
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="size_option" autocomplete="off">
                                    S<br>Pequeno
                                </label>
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="size_option" autocomplete="off">
                                    M<br>Médio
                                </label>
                            </div>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">$80.00</h2>
                            <h4 class="mt-0"><small>Ex Tax: $80.00</small></h4>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                            </a>
                            <a href="#" class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart mr-2"></i>Favoritar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                   href="#product-desc" role="tab">Descrição</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                   href="#product-comments" role="tab">Comentários</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                   href="#product-rating" role="tab">Avaliações</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel">
                                Aqui você pode colocar uma descrição detalhada do produto.
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel">
                                Exiba comentários de clientes sobre o produto.
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel">
                                Exiba avaliações e classificações dos usuários.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
