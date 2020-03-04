@extends('template.index')

@section('conteudo')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left"> Usuários</h4>
                <button type="button" onclick="modalCadastrarEditar('{{route('formulario_usuario_cadastrar_editar')}}')" class="btn btn-primary btn-round pull-right">Novo Usuário</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="table_id" >
                    <thead>
                      <th>
                        Nome
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach($usuarios as $usuario)
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                            <button type="button" onclick="modalCadastrarEditar('{{route('formulario_usuario_cadastrar_editar', $usuario->id)}}')" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></button>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

</script>

    <!-- Modal para cadastrar moradores -->
  <div class="modal" id="modalCadastrarEditar"tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
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
      <div id="modal-body" class="modal-body">
      
      </div>       
      </div>
    </div>
  </div>
    <!-- Fim do modal de editar moradores -->

    @section('scripts')
    <script>
      //Abre o modal para cadastrar ou editar, dependendo apenas dos parametros que forem passados
      function modalCadastrarEditar(rota, Id = false) {
        if (Id) {
                url = rota + "/" + Id
            } else {
                url = rota;
            }
            alert(url)
            $("#modalCadastrarEditar").modal('show');
            $('#modal-body').load(url);
      }

    </script>

    @if(count($errors) > 0)
    <script>
    $(function() {
        $('#modalCadastrarEditar').modal('show');
    });
    </script>
    @endif

    @endsection

@endsection
