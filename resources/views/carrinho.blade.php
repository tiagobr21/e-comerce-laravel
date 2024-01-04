
@extends('layout')
@section('title','home')
@section('content')


<div class="container ps-5">
    <div class="row">
  
  
      <h2>Carrinho de Compras</h2>


      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Foto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @php  $total = 0;  $quantidade = 1;   @endphp


        
        @foreach ($produtos as $chave => $produto)
   
          <tr >
            <th scope="row">{{ $chave + 1  }}</th>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->valor }}</td>
            <td> <a href="/storage/img/{{ $produto->foto }}" target="_blank"> <img src="{{asset('/storage/img/'.$produto->foto)}}"> </a></td>
          
            <td>{{ $produto->descricao }}</td>
            @if(isset($produto->quantidade))
                <td>{{ $produto->quantidade }}</td>
            @else
              <td>{{ $quantidade }}</td>
            @endif
            <td id="acoes"> 
            
              <form method="post" action="{{ route('adicionarQuantidade',$produto->id) }}">   @csrf<button type="submit" class="btn btn-success">Adicionar mais um item</button> </form><br>
                <a href="{{ route('removerCarrinho',['idpedido' => $chave]) }}"> <button type="button" class="btn btn-danger">Remover do Carrinho</button> </a>
           
            </td>

          </tr>


  
          @php 
            if(isset($produto->quantidade)){
              $total += $produto->valor * $produto->quantidade ;
            }else{
              $total += $produto->valor;
            }
          
       
               
          @endphp
        
        @endforeach

        </tbody>
       
       
        <tr>
          <td colspan="5">
             Total do carrinho: R$  {{ $total }}
          </td>
        </tr>

      </table>

       <form method="post" action="{{ route('carrinho_finalizar') }}">  
          @csrf
          <button type="submit" id="comprar" class="btn btn-success">Finalizar Compra</button>
       </form>
    </div>
  
  </div>
  
  <style>
  
    .container{
      margin-top: 100px;
      max-width: 100%;
      position: absolute;
    }

    img{
        width: 50px;
    }
  
    .d-flex{
      float: right;
    }

    #comprar{
      position: relative;
      top: 20px;
    }
    
  
  
  </style>

@endsection