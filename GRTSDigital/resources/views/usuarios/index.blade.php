@extends('template.index')

@section('conteudo')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left"> Usuários</h4>
                <button type="button" data-toggle="modal" data-target="#modalCadastrarEditar"  class="btn btn-primary btn-round pull-right">Novo Usuário</button>
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
                            <td><a href=""><i class="nc-icon nc-alert-circle-i"></i></a></td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

</script>

    <!-- Modal para editar moradores -->
    <div class="modal" id="modalCadastrarEditar"tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Usuário</h5>
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

    @section('scripts')
    <script>
      $( "#modal-body" ).load("formulario/usuario/cadastrar/editar");
    </script>
    @endsection

@endsection
