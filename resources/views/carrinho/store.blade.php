@extends('layout.app')
@section('main')
<script>
  function Alerta() {
    alert('Adicione algum item no carrinho');
  }
</script>
<section class="h-100 h-custom" style="background-color: #ffffff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Carrinho</h1>
                    <h6 class="mb-0 text-muted"><!--aqui vai a contagem dos itens--> </h6>
                  </div>
                  <hr class="my-4">
                  @foreach($carrinho as $item)

                  @csrf
                  @if($item->ITEM_QTD>0)
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="{{$item->Produto->ProdutoImagem[0]->IMAGEM_URL}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$item->Produto->PRODUTO_NOME}}</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">                  
                  <input id="form1" min="1" name="quantity" value="{{$item -> ITEM_QTD}}"  type="number"
                            class="form-control form-control-sm" disabled/>
                      <div>
                        <form action="{{route('carrinho.remove', $item->Produto->PRODUTO_ID)}}" method="POST">
                          @csrf
                          @method('delete')
                          <button class="lixeira"  type="submit">
                            <i class="fa-solid fa-trash fa-xs">
                              <svg xmlns="http://www.w3.org/2000/svg" height="30" width="20" viewBox="0 0 448 512">
                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                              </svg>
                            </i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      @if($item->ITEM_QTD==1)
                      <h6 class="mb-0">R${{$item->Produto->PRODUTO_PRECO}}</h6>
                    </div>
                    @else
                    <h6 class="mb-0">R${{$item->Produto->PRODUTO_PRECO * $item->ITEM_QTD}}</h6>
                    @endif
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <hr class="my-4">
                  @endif
                  @endforeach

                  @if(session('error'))
                  <div class="alert alert-warning" role="alert">
                    Ops, o carrinho está vazio! <a href="/" class="alert-link">Adicionar produtos ao carrinho</a>.
                  </div>
                  @else
                  <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                      <h3 class="fw-bold mb-5 mt-2 pt-1">Resumo</h3>
                      <hr class="my-4">

                      <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Desconto: </h5>
                        <?php
                        $desconto = 0;
                        ?>
                        <div id="invisivel">
                          @foreach($carrinho as $item)
                          {{ $desconto += $item->Produto->PRODUTO_DESCONTO * $item->ITEM_QTD}}

                          @endforeach
                        </div>
                        <h5>R${{$desconto}}</h5>
                      </div>
                      
                      
                      <hr class="my-4">

                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase">Total: </h5>
                        <?php
                        $preco = 0;
                        ?>
                        <div id="invisivel">
                          @foreach($carrinho as $item)
                          @if($item->ITEM_QTD>0)
                          {{$preco+=($item->Produto->PRODUTO_PRECO*$item->ITEM_QTD)-$desconto}}
                          @endif
                          @endforeach
                        </div>
                        <h5>R${{$preco}}</h5>
                      </div>
                      
                      <div class="d-flex justify-content-between mb-4">
                        <a href="/" style="color: white;  background-color:#BB2D3B; border: solid #BB2D3B 5px; border-radius:10px;   text-decoration: none;">
                          <h4 style="font-size:22px; padding:3px; ">Voltar</h4>
                        </a>
                      </div>                    
                      <form action="{{ route('pedido.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="buttonfinalizar">Finalizar</button>
                      </form>                     
                    @endif
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection