@extends('layout')
@section('title','cadastrar')
@section('content')

<div id="table" class="m-5">
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
             
              </tr>
            </thead>
          
            <tbody>
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td><a href="/storage/img/{{ $user->foto }}" target="_blank"><img src="{{asset('/storage/img/'.$user->foto)}}"></a></td>
         
              </tr>
              <tr>
            </tbody>
      </table>
    @endforeach
</div>

<style>
  #table{
   margin-top:200px; 
  }

  
  img{
        width: 50px;
    }

</style>


 
@endsection