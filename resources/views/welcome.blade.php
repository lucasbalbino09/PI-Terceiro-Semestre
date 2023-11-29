@extends('layout.app')
@section('main')
<!--Carrossel-->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-block center-content">
                <img src="{{('/img/bannercrs1.png')}}" alt="..." height="500">
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block center-content">
                <img src="{{('/img/bannercrs2.png')}}" alt="..." height="500">
            </div>
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block center-content">
                <img src="{{('/img/bnnlocalizacao.png')}}" alt="..." height="500">
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="
    background-color: #ffffff00;
">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="
    background-color: #ffffff00;
">
        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<!--Linha PRODUTOS EM DESTAQUE-->
<section class="produtos">
    <span class="title-secundary">Produtos em Destaque</span>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach(\App\Models\Produto::all()->take(3) as $produto)

        <div class="col">
            <div class="card">
                @if ($produto->ProdutoImagem->count() > 0)
                    <img src="{{ $produto->ProdutoImagem[0]->IMAGEM_URL }}" class="card-img-top" alt="...">
                @else
                    <img src="{{ asset('img/indisponivel.jpg') }}" class="card-img-top" alt="Imagem Indisponível">
                @endif
                <div class="card-body">
                    <p class="card-title">{{$produto->PRODUTO_NOME}}</p>
                    <p class="card-text" style="font-size: 25px; font-weight: bold;">R${{$produto->PRODUTO_PRECO}}</p>
                    <a href="{{route('produto.show', $produto->PRODUTO_ID)}}">
                        <button type="submit" class="buttonLogin">Comprar <i class="ri-shopping-cart-line"></i></button></a>
                </div>
            </div>
        </div>

        @endforeach

        <!-- Segundo Card mais vendidos -->
        <section class="produtos02">
            <span class="title-secundary">Mais Vendidos</span>
            <hr>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach(\App\Models\Produto::all()->take(6) as $produto)

                <div class="col">
                    <div class="card">
                        @if (count($produto->ProdutoImagem) > 0 && !empty($produto->ProdutoImagem[0]->IMAGEM_URL))
            @php
                $imagemUrl = $produto->ProdutoImagem[0]->IMAGEM_URL;

                // Verifica se a imagem é válida (não retorna 404)
                $headers = @get_headers($imagemUrl);

                // Se a variável $headers for falsa ou contiver '404', consideramos a imagem inválida
                $imagemValida = $headers && !in_array('HTTP/1.1 404 Not Found', $headers) && !in_array('HTTP/1.1 403 Not Found', $headers);
            @endphp

            @if ($imagemValida)
                <img src="{{ $imagemUrl }}" class="card-img-top" alt="...">
            @else
                <img src="{{ asset('img/indisponivel.jpg') }}" class="card-img-top" alt="Imagem Indisponível">
            @endif
        @else
            <img src="{{ asset('img/indisponivel.jpg') }}" class="card-img-top" alt="Imagem Indisponível">
        @endif
                        <div class="card-body">
                            <p class="card-title">{{$produto->PRODUTO_NOME}}</p>
                            <p class="card-text" style="font-size: 25px; font-weight: bold;">R${{$produto->PRODUTO_PRECO}}</p>
                            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}"><button type="submit" class="buttonLogin">Comprar <i class="ri-shopping-cart-line"></i></button></a>
                        </div>
                    </div>
                </div>

                @endforeach

        </section>
</section>
@endsection