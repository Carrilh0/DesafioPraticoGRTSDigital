
<form method="post" action="{{isset($cliente) ? route('editar_cliente') : route('cadastrar_cliente')}}">
    @csrf
    <input type="text" id="idCliente" name="idCliente" hidden value="{{isset($cliente) ? $cliente->id : '' }}">
    <input type="text" id="idResponsavel" name="idResponsavel" hidden value="{{isset($cliente) ? $cliente->responsavel->id : '' }}">
    <input type="text" id="idEndereco" name="idEndereco" hidden value="{{isset($cliente) ? $cliente->id : '' }}">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do cliente"
                    value="{{isset($cliente) ? $cliente->nome : '' }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="CPNPJ do cliente"
                    value="{{isset($cliente) ? $cliente->cnpj : '' }}" required>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Responsavel</label>
                <input type="text" id="responsavel" name="responsavel" class="form-control"
                    placeholder="Nome do responsavel" value="{{isset($cliente) ? $cliente->responsavel->nome : '' }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="Email do responsavel" value="{{isset($cliente) ? $cliente->responsavel->email : '' }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control"
                    placeholder="Telefone do responsavel" value="{{isset($cliente) ? $cliente->responsavel->telefone : '' }}" required>
            </div>
        </div>
        <div style="margin-top: 10px"class="col-md-12">
            <h6>Endereço Principal</h6>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="00.000-00"
                    value="{{isset($cliente) ? $cliente->endereco[0]->cep : '' }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estado" name="estado" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->estado : '' }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->cidade : '' }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->bairro : '' }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Logadouro</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->logradouro : '' }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Complemento</label>
                <input type="text" id="complemento" name="complemento" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->complemento : '' }}" required>
            </div>
        </div>



        <div class="col-md-2">
            <div class="form-group">
                <label>Nº</label>
                <input type="text" id="numero" name="numero" class="form-control"
                    value="{{isset($cliente) ? $cliente->endereco[0]->numero : '' }}">
            </div>
        </div>
    </div>

    <div class="col-md-12" style="text-align:right">
        <button type="submit" class="btn btn-success" id="salvar-usuario" style="float-right">Salvar</button>
    </div>

<form>

<script>
    
    $('#cep').focusout(function(){
        cep = $('#cep').val();
        $.ajax({
            method: "GET",
            url: "http://viacep.com.br/ws/"+cep+"/json/",
            success: function (endereco){
                $('#estado').val(endereco.uf)
                $('#cidade').val(endereco.localidade)
                $('#bairro').val(endereco.bairro)
                $('#logradouro').val(endereco.logradouro)
                $('#complemento').val(endereco.complemento)
            }
        })
    });

      $(document).ready(function(){
    $('#cep').mask('00000-000');
    $('#cnpj').mask('00.000.000/0000-00');
    })

    
</script>
