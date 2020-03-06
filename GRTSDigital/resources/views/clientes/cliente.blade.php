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
                <h4 class="card-title pull-left"> Dados do cliente {{$cliente->nome}}</h4>
                <button type="button" onclick="novoEndereco('{{route('formulario_endereco')}}')" class="btn btn-primary btn-round pull-right">Novo Endereço Alternativo</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
            <h6 class="border-bottom border-gray pb-2 mb-0">Cliente</h6>
            <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Nome do cliente</strong>
                {{$cliente->nome}}
                <strong class="d-block text-gray-dark">CNPJ</strong>
                {{$cliente->cnpj}}
                <strong class="d-block text-gray-dark">Responsavel</strong>
                {{$cliente->responsavel->nome}}
                <strong class="d-block text-gray-dark">Email</strong>
                {{$cliente->responsavel->email}}
                <strong class="d-block text-gray-dark">Telefone</strong>
                {{$cliente->responsavel->telefone}}
            </p>
            </div>
            <h6 class="border-bottom border-gray pb-2 mb-0">Endereço principal</h6>
            <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                <strong class="d-block text-gray-dark">Nome do cliente</strong>
                    {{$cliente->endereco[0]->cep}}
                <strong class="d-block text-gray-dark">Cidade</strong>
                    {{$cliente->endereco[0]->cidade}}
                <strong class="d-block text-gray-dark">Estado</strong>
                    {{$cliente->endereco[0]->estado}}
                <strong class="d-block text-gray-dark">Bairro</strong>
                    {{$cliente->endereco[0]->bairro}}
                <strong class="d-block text-gray-dark">Logradouro</strong>
                    {{$cliente->endereco[0]->logradouro}}
                <strong class="d-block text-gray-dark">Complemento</strong>
                    {{$cliente->endereco[0]->complemento}}
                <strong class="d-block text-gray-dark">Numero</strong>
                    {{$cliente->endereco[0]->numero}}
            </p>
            </div>
            <h6 class="border-bottom border-gray pb-2 mb-0">Endereços alternativos</h6>
            @foreach ($enderecos as $endereco)
            <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                <strong class="d-block text-gray-dark">Nome do cliente</strong>
                    {{$endereco->cep}}
                <strong class="d-block text-gray-dark">Cidade</strong>
                    {{$endereco->cidade}}
                <strong class="d-block text-gray-dark">Estado</strong>
                    {{$endereco->estado}}
                <strong class="d-block text-gray-dark">Bairro</strong>
                    {{$endereco->bairro}}
                <strong class="d-block text-gray-dark">Logradouro</strong>
                    {{$endereco->logradouro}}
                <strong class="d-block text-gray-dark">Complemento</strong>
                    {{$endereco->complemento}}
                <strong class="d-block text-gray-dark">Numero</strong>
                    {{$endereco->numero}}
            </p>
            </div>
            @endforeach
              </div>
            </div>
          </div>

</script>

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
                    <form id="excluir" method="POST" action="{{route('remover_cliente')}}">
                      @csrf
                    <input name="id" type="input" hidden id="id" class="btn btn-danger" />
                    <input type="submit" id="href" class="btn btn-danger" value="Sim"/>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @section('scripts')
    <script>
      //Abre o modal para cadastrar ou editar, dependendo apenas dos parametros que forem passados
      function novoEndereco(url) {
        
            $("#modalEndereco").modal('show');
            $('#modal-body').load(url);
      }
    </script>

    @endsection

@endsection
