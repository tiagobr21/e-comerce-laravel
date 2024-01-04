<?php


namespace App\Services;
use App\Models\Pedidos;
use App\Models\ItensPedidos;
use App\Models\User;
use Log;

class VendaService {
    public function finalizarVenda($prods = [], User $user){

       try{ 


        $dtHoje = new \DateTime();
 
        $pedidos = Pedidos::create([
          'datapedido' =>  $dtHoje->format("Y-m-d H:i:s"),
          'status' => "PEN",
          'usuario_id' => $user->id,
        ]);
       


        foreach ($prods as $p) {
     
     
          $itens = ItensPedidos::create([
            'quantidade' =>  $p->quantidade,
            'valor' =>  $p->valor,
            'dt_item' => $dtHoje->format("Y-m-d H:i:s"),
            'produto_id' => $p->id,
            'pedido_id' => $pedidos->id,
          ]);
   
        }
      
        return['status'=>'OK', 'message'=>'Venda finalizada com sucesso'];
          

       }catch(\Exception $e){
        \DB::rollback();
         Log::error("ERRO:VENDA SERVICE",['message'=> $e->getMessage()]);
         return ['status'=>'err', 'message'=> 'Venda não pode ser finalizada'];
       } 
    }
}