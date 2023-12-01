@extends('layout.app')
    @section('main')
    <style>
    .card{
        display: inline-block;
       margin-top: 3%;
        position: relative;
    }

</style>
<h1>Novidades e Coleções</h1>

@foreach($produtos as $produto)
    <div class="card" style="width: 30rem;">
        @if ($produto->ProdutoImagem->count() > 0)
                <img src="{{ $produto->ProdutoImagem[0]->IMAGEM_URL }}" class="card-img-top" alt="...">
        @else
                <img src="{{ asset('img/indisponivel.jpg') }}" class="card-img-top" alt="Imagem Indisponível">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>                            
            <p class="card-text"><strong style="font-size: 25px; color: red;"> R${{ $produto->PRODUTO_PRECO }} </strong></p>
            <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}">
                <button type="submit" class="buttonLogin">Comprar</button>
            </a>
        </div>
    </div>
@endforeach


 @endsection
