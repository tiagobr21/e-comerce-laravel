<?php 


 
   $produtos_cart = session('cart');
   if($produtos_cart){
    $quantidade = count( $produtos_cart);
   }

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


   <nav class="navbar navbar-light navbar-expand-md bg-light l-10 r-5 p-4">
        <a href="#" class="navbar-brand">MyShop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
            
                    <li><a class="nav-link" href="/">Home</a></li>
                    <li><a id="produtos"  class="nav-link" href="">Produtos <b><i class="fa fa-chevron-circle-down"></i></b></a>
                        <ul class="dropdown_produtos">
                               
                                <div id="subitem" class="container text-center">
                                    <div class="row align-items-center">
                                      <div class="col">
                                        <label>Casual</label>
                                        <li> <a href="/produtos/1">Blusas</a> </li>
                                      </div>
            
                                    </div>
                                  </div>
                
                       
                        </ul>
                    </li>
                      
                    @if (Auth::user()?->role == 'admin')
                      
                    <li><a id="adm"  class="nav-link" >Funções Administrativas <b><i class="fa fa-chevron-circle-down"></i></b></a>
                        <ul class="dropdown_adm">

                            <div id="subitem" class="container text-center">
                                <div class="row align-items-center">
                                  <div class="col">
                         
                                    <li><a  class="nav-link" href="{{ route('categoria') }}">Categorias </a></li>
                                    <li><a  class="nav-link" href="{{ route('clientes') }}">Clientes</a></li>
                                   
                                  </div>
                                  

                                  <div class="col">
                         
                                    <li><a class="nav-link" >Fornecedores</a></li>
                                   
                                  </div>
                                  
                                
                                </div>
                              </div>
                 
                        </ul>
                    
                    </li>
                    @endif
                
                   
                    <li><a  class="nav-link" href="">Contato</a></li>
                   
          
            </div>

        </div>
  
        @guest
          
        <div class="navbar-nav">

          <a  href="/login"  class="nav-link" > Entrar </a>
         
           <a  href="/register"  class="nav-link" >Cadastrar </a>
        
     
        </div>
        @endguest

        @auth
        
        <div class="navbar-nav">
          <form action="/logout" method="POST">
            @csrf
           <a  href="/logout"  class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> </a>
          </form>
     
        </div>
        @endauth
        

        <div id="cart">
    
          <a href="{{  route('carrinho') }}" id="carrinho" class="btn btn-sm">
            <div id="container-count">
             @if($produtos_cart) <p id="count"> {{ $quantidade }}</p> @endif
           </div>
            <i class="fa fa-shopping-cart fa-lg">
           
            </i>
          </a>

        </div>  

       
         
   
  
    </nav>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
      
          $("#produtos").click(function(e){

            e.preventDefault();
            $('.dropdown_produtos').slideToggle('slow');

            $('.dropdown_adm').css("display","none");
          }); 
 
          $("#adm").click(function(e){

            e.preventDefault();
            $('.dropdown_adm').slideToggle('slow');
            
            $('.dropdown_produtos').css("display","none");
          }); 
          


        });
    </script>

    <style>
        a{
            margin: 10px;
            text-decoration:none;
            cursor: pointer;
        }

        .dropdown_produtos {
            list-style-type:none;
            padding: 10px;
            margin-left: 15px;
            position: absolute;
            border-radius: 10px;
            background: #445964;
            display: none;
            
         }

         .dropdown_adm{
            list-style-type:none;
            padding: 10px;
            margin-left: 15px;
            position: absolute;
            border-radius: 10px;
            background: #445964;
            display: none;
         }


         .navbar-nav ul li{
            margin-top:10px; 
            text-align: center
         }
         


        .navbar-nav ul li a{
            color: #adb5bd;
     
          
         }

         #subitem{
            padding: 20px;
            margin-top: -5px; 
            position: relative;
         }


         #container-count{
           border-radius:20px; 
           max-width:70%;
           position: relative;
           left: 15px;
           top: 22px;
           background: grey
         }

         #count{
            font-size: 15px;
         }

     
    </style>

    


@yield('content')
     
   

</body>
</html>
