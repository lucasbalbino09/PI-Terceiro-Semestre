@extends('layout.app')
    @section('main')
    <style>
    .card{
        display: inline-block;
       margin-top: 3%;
        position: relative;
    }

</style>

    <h1>Produtos abaixo de <span style="font-weight: bold;"> R$ 100,00 </span></h1>

   @foreach($produtos as $produto)



<div class="card" style="width: 18rem;">
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
            <p class="card-text"><strong style="font-size: 25px; color: red;">R${{$produto->PRODUTO_PRECO}}</strong> </p>
            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}"><button type="submit" class="buttonLogin">Comprar</button></a>
        </div>
    </div>


@endforeach
 @endsection
