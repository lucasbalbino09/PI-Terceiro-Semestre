@extends('layout.app')
    @section('main')
    <style>
    .card{
        display: inline-block;
       margin-top: 3%;
        position: relative;
    }

</style>
<h1>
{{$categoria->CATEGORIA_NOME}}</h1>



@foreach($categoria->Produtos as $produto)



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
            <h5 class="card-title">{{$produto->PRODUTO_NOME}}</h5>
       
            <p class="card-text">R${{$produto->PRODUTO_PRECO}}</p>
            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}"><button type="submit" id="botaocard">Comprar</button></a>
        </div>
    </div>


@endforeach
@endsection
