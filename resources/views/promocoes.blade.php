@extends('layout.app')
@section('main')
<style>
    .card {
        display: inline-block;
        margin-top: 3%;
        position: relative;
    }
</style>

<h1>Produtos Abaixo de <span style="font-weight: bold;"> R$ 100,00 </span></h1>

@foreach($produtos as $produto)



<div class="card" style="width: 18rem;">
    @if (count($produto->ProdutoImagem) > 0 && !empty($produto->ProdutoImagem[0]->IMAGEM_URL))
    <img src="{{ $produto->ProdutoImagem[0]->IMAGEM_URL }}" class="card-img-top" alt="...">
    @else
    <img src="{{ asset('img/indisponivel.jpg') }}" class="card-img-top" alt="Imagem Indisponível">
    @endif
    <div class="card-body">
        <p class="card-title">{{$produto->PRODUTO_NOME}}</p>
        <p class="card-text"><strong style="font-size: 25px; color: red;">R${{$produto->PRODUTO_PRECO}}</strong> </p>
        <a href="{{route('produto.show', $produto->PRODUTO_ID)}}"><button type="submit" class="buttonLogin">Comprar</button></a>
    </div>
</div>


@endforeach
@endsection