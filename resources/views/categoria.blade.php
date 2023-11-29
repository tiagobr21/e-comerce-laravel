@extends('layout')
@section('title','categoria')
@section('content')


<div class="container ms-5">
    <div class="row">
  
     
    <h2>Categorias</h2>
         @foreach ($categorias as $categoria)
             
       
         <div class="col-2 m-5">
            <div class="card">
               <a href="/produto/{{ $categoria->id }}"> 
                  <img id="img-categoria" src="{{asset('/storage/img/'.$categoria->foto)}}" class="card-img-top">
               </a>
            </div>
            <div class="card-body">
               <h6 class="card-title m-2">{{ $categoria->nome }}</h6>
            </div>
         </div>
       
        @endforeach
  
        <div class="col-2 m-5">
           <div class="card">
             <a href="{{ route('cadastrarCategoria') }}"> <img style="cursor: pointer" src="{{ asset('img/plus.png') }}" class="card-img-top"></a> 
           </div>
        <div class="card-body">
           <h6 class="card-title m-2 text-center"> Cadastra Categoria</h6>
        </div>
        </div>
  
    </div>

@endsection

<style>
     .container{
      margin-top: 100px;
      position: absolute;
  }

  #img-categoria:hover{
    width: 250px;
    cursor: pointer;
  }
</style>