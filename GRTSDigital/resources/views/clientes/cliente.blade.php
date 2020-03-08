@extends('template.index')

@section('conteudo')
<div class="content">
@if ($errors->any())
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:black!important">&times;</a>
      <ul style="padding-bottom:0;margin-bottom:0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif 


<div class="row">
  <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Dados do Cliente</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Responsavel</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </thead>
                <tbody>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cnpj}}</td>
                    <td>{{$cliente->responsavel->nome}}</td>
                    <td>{{$cliente->responsavel->email}}</td>
                    <td>{{$cliente->responsavel->telefone}}</td>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
        

<div class="row">
  <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Endereços</h4>
        <button type="button" class="btn btn-primary btn-round pull-right"
        onclick="novoEndereco('{{route('formulario_endereco',$cliente->id)}}')">Novo Endereço</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Bairro</th>
                    <th>Logradouro</th>
                    <th>Complemento</th>
                    <th>Número</th>
                    <th>Principal</th>
                </thead>
                
                @foreach ($enderecos as $endereco)
                    <tbody>
                        <td>{{$endereco->cidade}}</td>
                        <td>{{$endereco->estado}}</td>
                        <td>{{$endereco->bairro}}</td>
                        <td>{{$endereco->logradouro}}</td>
                        <td>{{$endereco->complemento}}</td>
                        <td>{{$endereco->numero}}</td> 
                        <td>{{$endereco->principal ? 'Sim' : 'Não'}}</td>
                        <td>
                            @if($endereco->principal)                             
                              <button type="button" onclick="maps('{{$endereco->cep}}')" class="btn btn-sm btn-warning"><i class="fas fa-map-marked-alt"></i></button>
                              <button type="button" onclick="novoEndereco('{{route('formulario_endereco',$endereco->id)}}')" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></button>
                              <button type="button" disabled class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            @else 
                              <button type="button" onclick="maps('{{$endereco->cep}}')" class="btn btn-sm btn-warning"><i class="fas fa-map-marked-alt"></i></button>
                              <button type="button" onclick="novoEndereco('{{route('formulario_endereco',$endereco->id)}}')" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></button>
                              <button type="button" onclick="confirmarExclusao('{{$endereco->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            @endif
                        </td>
                        
                    </tbody>
                @endforeach
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

</script>

<!-- Modal para google maps -->
<div class="modal" id="maps"tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Endereço no mapa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>      
      <div id="map-body" class="modal-body">
      
    </div>       
      </div>
    </div>
  </div>
<!-- Fim do Modal para google maps -->

<!-- Modal para cadastrar moradores -->
  <div class="modal" id="modalEndereco"tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Novo Endereço Alternativo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>      
      <div id="modal-body" class="modal-body">
      
      </div>       
      </div>
    </div>
  </div>
    <!-- Fim do modal de editar moradores -->

<!-- Modal de deletar -->
<div class="modal fade" id="remover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" data-backdrop="static">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title ">ATENÇÃO</h3>
            </div>
            <div class="modal-body">

                <h4>Tem certeza de que deseja excluir o item selecionado?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <form id="excluir" method="POST" action="{{route('remover_endereco')}}">
                  @csrf
                  <input id="id" name="id" type="input" hidden />
                    <input type="submit" class="btn btn-danger" value="Sim"/>
                </form>
            </div>

        </div>
    </div>
</div>

    @section('scripts')
    <script>
      //Abre o modal para cadastrar ou editar, dependendo apenas dos parametros que forem passados
      function maps(cep)
      {
        $('#map-body').append(`<iframe style="width: 100%;height: 500px;" src="https://www.google.com.br/maps?q=${cep},%20Brasil&output=embed"> </iframe>`)
        $("#maps").modal('show');
      }
      
      function novoEndereco(rota, id) {
        if(id){
            var url = rota + "/" + id
        }else {
            var url = rota;
        }

        $("#modalEndereco").modal('show');
        $('#modal-body').load(url);
      }

      function confirmarExclusao(id)
      {
        $('#id').attr('value', id);
        $("#remover").modal('show');
      }
    </script>

    @endsection

@endsection
