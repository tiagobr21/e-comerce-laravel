@extends('layout')
@section('title','home')


@section('content')

 

  <div class="col-12 p-5">

    <div class="col-12 p-1">
        <h2>Minhas Compras</h2>
      </div>
    <table class="table table-bordered ">
       <tr>
         <th>Data da Compra</th>
         <th>Situação</th>
       </tr>
       @foreach ($listaPedido as $ped)
           <tr>
             <td>{{ Carbon\Carbon::parse($ped->datapedido)->format("d/m/Y H:i") }}</td>
             <td>{{ $ped->statusDesc() }}</td>
             <td>
  
               <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{ $ped->id }}" data-toggle="modal" data-target="#modalcompra">
                  <i class="fa fa-shopping-basket"></i>
               </a>
             </td>
           </tr>
       @endforeach 
    </table>
  </div>
  
  <div class="modal fade" id="modalcompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalhes da Compra</h5>
          
        </div>
        <div class="modal-body">
           <div id="conteudopedido" ></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
  <script>

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      // view historico

          $(".infocompra").on('click',()=>{

            // ao clicar no link com class .infocompra esta função sera executada
            let id = $(".infocompra").attr("data-value");
        
            $.post('{{ route("detalhes_compras") }}', {idpedido : id}, (result) =>{
              $("#conteudopedido").html(result)
            })
          })
    

  </script>

@endsection