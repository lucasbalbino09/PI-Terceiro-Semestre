<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Carrinho;
use App\Models\PeditoItem;
use Illuminate\Http\Request;
use App\Models\Endereco;
use illuminate\Support\Facades\Auth;


class PedidoController extends Controller
{
    public function index(){

        $pedidos = Pedido::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get();
      
        
        //console.log($pedidos);

      return view('pedido.index')->with('pedidos',$pedidos);
    }
    public function checkout(){

      $usuario = Auth::user();      
      
        $enderecoId = Endereco::where('USUARIO_ID','=',$usuario->USUARIO_ID)->value('ENDERECO_ID');

        $pedido =Pedido::create([
            'USUARIO_ID' => $usuario->USUARIO_ID,
            'ENDERECO_ID' => $enderecoId,
            'STATUS_ID' => 1,
            'PEDIDO_DATA'=> now()
        ]);

        $itens = Carrinho::where([['USUARIO_ID','=', $usuario->USUARIO_ID], ['ITEM_QTD', '>', 0]])
               ->get();
               if(count($itens) > 0) {
                 foreach($itens as $item){
                  
                  PeditoItem::create([
                    'PEDIDO_ID' =>$pedido->PEDIDO_ID,
                    'PRODUTO_ID' => $item->PRODUTO_ID,
                    'ITEM_QTD' => $item->ITEM_QTD,
                    'ITEM_PRECO'=>$item->Produto->PRODUTO_PRECO
                ]);
                $item->update([
                  'ITEM_QTD'=>0
  
                ]);
  
                 }                 
                 return redirect(route('pedido.show',$pedido->PEDIDO_ID));
               }           
               return redirect()->back()->with('error', 'Erro ao criar pedido. O carrinho está vazio.');
    }
    public function show(Pedido $pedido)
    {      
        $carrinho = PeditoItem::where([['PEDIDO_ID','=', $pedido->PEDIDO_ID]])->get();
         return view ('pedido.show', ['pedido' =>$pedido,'carrinho'=>$carrinho]);

    }


}
