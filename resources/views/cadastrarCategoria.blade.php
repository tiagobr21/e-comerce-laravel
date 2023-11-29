@extends('layout')
@section('title','cadastrar produto')
@section('content')

<div id="container" class="position-absolute top-50 start-50 translate-middle">
  <h2> Cadastrar Categoria </h2>
  <br>
  <form id="form" method="post"  action="/categoria/cadastrar_do" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Nome</b></label>
      <input type="text" name="nome" class="form-control" placeholder="Ex: Camisa Polo Adidas" >
    </div>


    <div class="col-12">
      <label for="inputAddress" class="form-label"><b>Foto</b></label>
      <input type="file" name="image" class="form-control-file" id="inputAddress">
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