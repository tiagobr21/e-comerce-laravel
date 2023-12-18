
@extends('layout')
@section('title','home')
@section('content')

@if (\Session::has('success'))
    <div class="alert alert-success">
      
            {!! \Session::get('success') !!}
    
    </div>
@endif

    <div class="container mt-5">
        <form class="row g-3"   action="/conta/update_account" enctype="multipart/form-data">
            <div class="col-md-6">
            <input hidden value="{{ $user_logado->id }}" name="id">
            <label for="inputEmail4" class="form-label">Nome</label>
            <input type="text" value="{{ $user_logado->name }}" name="name" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Email</label>
            <input type="email" value="{{ $user_logado->email }}" name="email" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
            <label for="inputAddress" class="form-label">Telefone</label>
            <input type="text" value="{{ $user_logado->phone }}" name="phone" class="form-control" id="inputAddress">
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