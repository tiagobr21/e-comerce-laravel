<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;
use \App\Models\Categoria;
use \App\Models\Pedidos;
use Auth;
use App\Services\VendaService;
use \App\Models\ItensPedidos;

class ProdutoController extends Controller
{
   



   public function index(Request $request){

      $produtos = Produto::latest()
  
      ->paginate(5);



      return view('home',compact('produtos'));
    }
   
    // PRODUTO
   public function cadastrarProduto(Request $request){
     $categorias = Categoria::all();
 
     return view("cadastrarProduto",compact('categorias'));
   }

   public function cadastrarProduto_do(Request $request){



      if($request->hasFile('image')){
      
        $destination_path = 'public/img';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($destination_path,$image_name);

      }

      $produto = Produto::create([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'foto' => $image_name,
        'descricao' => $request->descricao,
        'categoria_id' => $request->categoria_id,
    ]);
    
    return redirect('/');
    

  }

  public function deletarProduto(Request $request,$id){
     $produto = Produto::find($id);

     $produto->delete();

     return redirect('/');
  }



  // CATEGORIA

   public function categoria(Request $request){

    $categorias = Categoria::all();

     return view("categoria",compact('categorias'));
   }


   public function cadastrarCategoria(Request $request){
    return view("cadastrarCategoria");
   }

   public function cadastrarCategoria_do(Request $request){
    
    if($request->hasFile('image')){
      
      $destination_path = 'public/img';
      $image = $request->file('image');
      $image_name = $image->getClientOriginalName();
      $path = $request->file('image')->storeAs($destination_path,$image_name);

    }

    $categoria = Categoria::create([
      'nome' => $request->nome,
      'foto' => $image_name,
    ]);

    return redirect('/categoria');
      
   }

   public function produtosPorCategoria(Request $request, Categoria $categoria){
        $produtos = Produto::where('categoria_id',$categoria->id)
        ->latest()
        ->paginate(5);
        
        return view("produtos_por_categoria",compact('produtos','categoria'));
   }

  // CARRINHO

   public function carrinho(Request $request){
     $produtos = session('cart');
     
      if($produtos){

      return view("carrinho",compact('produtos'));

      }else{
        return redirect('/')->with('empty', 'Carrinho vazio'); 
      }
    }

    public function adicionarCarrinho(Request $request, $id){
      $produto = Produto::find($id);
      
  
      $carrinho = session('cart',[]);
      
      array_push($carrinho,$produto);


      session(['cart'=> $carrinho]);

      return redirect('/');
   }

   public function adicionarQuantidade(Request $request, $id){
    $carrinho = session('cart',[]);
    
    foreach ($carrinho as $key => $value) {
       if($value->id == $id){

        if($value->quantidade == null){
          $value->quantidade = 1;
        }
         
         $value->quantidade += 1 ;
       }
    }

    session(['cart'=> $carrinho]);
    
    return redirect('/carrinho');
   }

   public function finalizarCarrinho(Request $request){
      $prods = session('cart',[]);
    
      $vendaService = new VendaService();
      $result = $vendaService->finalizarVenda($prods, \Auth::user());
      


      if($result["status"] == "OK"){
        $request->session()->forget("cart");
      }

      $request->session()->flash($result["status"],$result["message"]);
      

      return redirect('/compras/pagar');
  }

  public function removerCarrinho(Request $request, $id){

    $carrinho =  session('cart');
  
    unset($carrinho[$id]);
    
  
    session(['cart'=> $carrinho]);

    return redirect('/carrinho');
  }



  //COMPRAS
  
  public function historicoCompras(Request $request){
      
  

    $idusuario = Auth::user()->id;

    $listaPedido = Pedidos::where("usuario_id",$idusuario)
                            ->orderBy("datapedido","desc")
                            ->get();
    

    return view('historico',compact('listaPedido'));
      
  }

   public function detalheCompras(Request $request) {
      $idpedido = $request->input("idpedido");
      $listaItens = ItensPedidos::join("produtos","produtos.id","=","itens_pedidos.produto_id")
                    ->where("pedido_id", $idpedido)
                    ->get(['itens_pedidos.*','itens_pedidos.valor as valoritem','produtos.*']);

      return view("detalhes", compact('listaItens'));
   }
    



    public function pagarCompras(Request $request){

        return view("pagar");
    }
}
