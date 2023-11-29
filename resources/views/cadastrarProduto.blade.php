@extends('layout')
@section('title','cadastrar produto')
@section('content')

<div id="container" class="position-absolute top-50 start-50 translate-middle">
  <h2> Cadastrar Produto </h2>
  <br>
  <form id="form" method="post"  action="/produto/cadastrar_do" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Nome</b></label>
      <input type="text" name="nome" class="form-control" placeholder="Ex: Camisa Polo Adidas" >
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label"><b>Valor</b></label>
      <input type="number" name="valor" class="form-control" placeholder="Ex:79.90" >
    </div>

    <div class="col-12">
      <label for="inputAddress" class="form-label"><b>Foto</b></label>
      <input type="file" name="image" class="form-control-file" id="inputAddress">
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label"><b>Descrição</b></label>
      <input type="text" name="descricao" class="form-control" id="inputAddress2" placeholder="Champion Camisa masculina de algodão com gola redonda e secagem dupla">
    </div>

    <div class="col-md-4">
      <label for="inputState" class="form-label"><b>Categoria</b></label>
      
        
      
      <select name="categoria_id" id="inputState" class="form-select">
        <option selected>Choose...</option>

        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id}}">{{ $categoria->nome }}</option>
        @endforeach
      </select>

   
    </div>
 
    <div class="col-12 mt-4">
      <button type="submit" id="salvar" class="btn btn-primary w-50">Enviar</button>
    </div>
  </form>

    
  <style>

    #container{
       width: 50%;
       height: 70%;
       padding: 10px;
       margin-top: 100px;
       background: rgb(246, 246, 246);
       border-radius: 40px;
    }
    
   
    #salvar{
      margin: 0 auto;
      text-align: center;
      display: flex;
      justify-content: center;
    }
  </style>


@endsection