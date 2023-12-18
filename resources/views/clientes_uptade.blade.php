
@extends('layout')
@section('title','home')
@section('content')

@if (\Session::has('success'))
    <div class="alert alert-success">
      
            {!! \Session::get('success') !!}
    
    </div>
@endif

@if (\Session::has('error'))
    <div class="alert alert-danger">
      
            {!! \Session::get('error') !!}
    
    </div>
@endif

    <div class="container mt-5">
        <form class="row g-3"  action="/cliente/update_client_do" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
            <input hidden value="{{ $user->id }}" name="id">
            <label for="inputEmail4" class="form-label">Nome</label>
            <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Email</label>
            <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
            <label for="inputAddress" class="form-label">Telefone</label>
            <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" id="inputAddress">
            </div>

            <div class="col-md-2">
                <label for="inputState" class="form-label">Permissão</label>
                <select id="inputState" name="role" class="form-select">
                  <option selected>{{ $user->role }}</option>
                  @if($user->role == 'admin')
                    <option name="role">user</option>
                  @else
                    <option name="role">admin</option>
                  @endif
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="inputAddress" class="form-label">Mudar Senha</label>
                <input type="text" name="password" class="form-control" id="inputAddress">
            </div>
           
           
            <button type="submit" class="btn btn-primary">Atualizar</button>
      
        </form>
    </div>

    <script>

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
      </script>

@endsection