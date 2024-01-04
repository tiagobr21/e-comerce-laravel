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
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label"><b>Email</b></label>
      <input id="email" type="email" name="email" class="form-control" required>
      <div id="alertexistemail">
     
      </div>
    </div>

   


    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Telefone</b></label>
      <input id="phone" type="text" name="phone" class="form-control" required> 
      <div id="alertexistphone">
      
      </div>
    </div>
   


    <div class="col-md-6">
      <label for="inputEmail4" class="form-label"><b>Password</b></label>
      <input type="password" name="password" class="form-control" required>
    </div>
 

    <div class="col-md-4">
      <label for="inputState" class="form-label"><b>Permissão</b></label>
      
        
      
      <select name="role" id="inputState" class="form-select" required>

        <option value="user"> user </option>
        <option value="admin"> admin </option>

      </select>

   
    </div>
 
    <div class="col-12 mt-4">
      <button type="submit" id="salvar" class="btn btn-primary w-50">Criar</button>
    </div>
  </form>


  <script>

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
     
      $(document).ready(function() {
         

        let phone = $("#phone");
        let email = $("#email");
        
        email.focusout( function(){
          let email_user =  email.val();
        

          $.post('{{ route("ifemailexist") }}', {ifexist : email_user}, (result) =>{
 
              if(result == 'Email já existe'){
                $('#alertexistemail').html(result); 
                $('#alertexistemail').removeClass();
                $('#alertexistemail').addClass('alert alert-danger');
              }else{
                $('#alertexistemail').html(result); 
                $('#alertexistemail').removeClass();
                $('#alertexistemail').addClass('alert alert-success');
              }
           
          });

          
        });
        
        phone.focusout( function(){
          let number =  phone.val();
        

          $.post('{{ route("ifphoneexist") }}', {ifexist : number}, (result) =>{
 
              if(result == 'Telefone já existe'){
                $('#alertexistphone').html(result); 
                $('#alertexistphone').removeClass();
                $('#alertexistphone').addClass('alert alert-danger');
              }else{
                $('#alertexistphone').html(result); 
                $('#alertexistphone').removeClass();
                $('#alertexistphone').addClass('alert alert-success');
              }
           
          });

          
        });

    });


  </script>

    
  <style>

    #container{
       width: 50%;
       height: auto;
       padding: 50px;
       margin-top: 70px;
       background: rgb(246, 246, 246);
       border-radius: 40px;
    }

    .alert{
       padding: 5px;
       margin-bottom: -10px;
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