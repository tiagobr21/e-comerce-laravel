
@extends('layout')
@section('title','home')
@section('content')


<div class="container ps-5">
    <div class="row">
  
  
      <h2>Carrinho de Compras</h2>

   
  
      @foreach ($produtos as $chave => $produto)
  

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Foto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{ $chave + 1  }}</th>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->valor }}</td>
            <td> <a href="/storage/img/{{ $produto->foto }}" target="_blank"> <img src="{{asset('/storage/img/'.$produto->foto)}}"> </a></td>
            <td>{{ $produto->descricao }}</td>
            <td> <a href="{{ route('removerCarrinho',['idpedido' => $chave]) }}"> <button type="button" class="btn btn-danger">Remover do Carrinho</button> </a></td>
          </tr>
        
        </tbody>
      </table>

      
       @endforeach

  
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
  
  
  
  </style>

@endsection