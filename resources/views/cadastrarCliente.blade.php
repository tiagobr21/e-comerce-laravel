@extends('layout')
@section('title','cadastrar produto')
@section('content')

<div id="container" class="position-absolute top-50 start-50 translate-middle">
  <h2> Cadastrar Cliente </h2>
  <br>
  <form id="form" method="post"  action="/cliente/cadastrar_do" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Nome</b></label>
      <input type="text" name="name" class="form-control" >
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label"><b>Email</b></label>
      <input type="email" name="email" class="form-control" >
    </div>

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Telefone</b></label>
      <input type="text" name="phone" class="form-control">
    </div>

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Password</b></label>
      <input type="password" name="password" class="form-control">
    </div>
 

    <div class="col-md-4">
      <label for="inputState" class="form-label"><b>Permissão</b></label>
      
        
      
      <select name="role" id="inputState" class="form-select">
        <option selected>Choose...</option>

        <option value="user"> user </option>
        <option value="admin"> admin </option>

      </select>

   
    </div>
 
    <div class="col-12 mt-4">
      <button type="submit" id="salvar" class="btn btn-primary w-50">Criar</button>
    </div>
  </form>

    
  <style>

    #container{
       width: 50%;
       height: 70%;
       padding: 60px;
       margin-top: 50px;
       background: rgb(246, 246, 246);
       border-radius: 40px;
    }
    
   
    #salvar{
      position: relative;
      top:30px;
      margin: 0 auto;
      text-align: center;
      display: flex;
      justify-content: center;
    }
  </style>


@endsection