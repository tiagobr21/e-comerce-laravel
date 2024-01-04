@extends('layout')
@section('title','cadastrar')
@section('content')

<div id="table" class="m-3">
  <h2>Clientes</h2><br>
    @foreach ($users as $user)
      <table class="table table-striped">
          <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Foto</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
          
            <tbody>
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td><a href="/storage/img/{{ $user->foto }}" target="_blank"><img src="{{asset('/storage/img/'.$user->foto)}}"></a></td>
                <td>
                 <a href="/cliente/atualizar/{{ $user->id }}"> <i id="edit" class="fa fa-edit fa-lg"></i> </a>
                    <br>
                    <a href="/cliente/deletar/{{ $user->id }}">  <i id="delete" class="fa fa-trash fa-lg"></i></a>
                </td>
              </tr>
              <tr>
            </tbody>
      </table>

    @endforeach


      <div class="flex">
        <div id="paginate">{{ $users->links() }}</div>
        <div class="float"></div>
        <div class="addnewuser">
          @if (Auth::user()?->role == 'admin')
          <div class="col-2 m-1">
            <div class="card">
              <a href="{{ route('cadastrar_cliente') }}"> <img style="cursor: pointer" src="{{ asset('img/plus.png') }}" class="card-img-top"></a> 
            </div>
          <div class="card-body">
            <h6 class="card-title m-2 text-center"> Cadastrar Cliente</h6>
          </div>
          </div>
          @endif
        </div>
      </div>
</div>

<style>
  #table{
   margin-top:200px; 
  }

  .flex{
    display: flex;
  }

  .addnewuser{
    position: relative;
  
  }

  
  img{
        width: 50px;
  }

  #edit{
    color:rgb(42, 22, 225);
    cursor: pointer;
  }

  #delete{
    color:red;
    cursor: pointer;
  }

  .card{
    width: 150px;
    cursor: pointer;
  }
   
  #img-produto:hover{
    width: 200px;
    cursor: pointer;
  }

  .float{
    margin-left: 45%;
  }
  .addnewuser{
    margin-left: 30%;
  }

  

  

</style>


 
@endsection