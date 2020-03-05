
<form method="post" action="{{route('cadastrar_cliente')}}">
    @csrf
    <input type="text" id="id" name="id" hidden value="{{isset($usuario) ? $usuario->id : '' }}">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do cliente"
                    value="{{isset($usuario) ? $usuario->nome : '' }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>CNPJ</label>
                <input type="text" id="cpnj" name="cnpj" class="form-control" placeholder="CPNPJ do cliente"
                    value="{{isset($usuario) ? $usuario->email : '' }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Responsavel</label>
                <input type="text" id="responsavel" name="responsavel" class="form-control"
                    placeholder="Nome do responsavel" value="">
            </div>
        </div>
        <div style="margin-top: 10px"class="col-md-12">
            <h6>Endereço Principal</h6>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="00.000-00"
                    value="{{isset($usuario) ? $usuario->nome : '' }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estado" name="estado" class="form-control"
                    value="{{isset($usuario) ? $usuario->nome : '' }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control"
                    value="{{isset($usuario) ? $usuario->email : '' }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control"
                    value="{{isset($usuario) ? $usuario->nome : '' }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Logadouro</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control"
                    value="{{isset($usuario) ? $usuario->email : '' }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Complemento</label>
                <input type="text" id="complemento" name="complemento" class="form-control"
                    value="{{isset($usuario) ? $usuario->nome : '' }}">
            </div>
        </div>



        <div class="col-md-2">
            <div class="form-group">
                <label>Nº</label>
                <input type="text" id="numero" name="numero" class="form-control"
                    value="{{isset($usuario) ? $usuario->email : '' }}">
            </div>
        </div>
    </div>

    <div class="col-md-12" style="text-align:right">
        <button type="submit" class="btn btn-success" id="salvar-usuario" style="float-right">Salvar</button>
    </div>

<form>

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    
    $('#cep').focusout(function(){
        cep = $('#cep').val();
        $.ajax({
            method: "GET",
            url: "http://viacep.com.br/ws/"+cep+"/json/",
            success: function (endereco){
                console.log(endereco);
                $('#estado').val(endereco.uf)
                $('#cidade').val(endereco.localidade)
                $('#bairro').val(endereco.bairro)
                $('#logradouro').val(endereco.logradouro)
                $('#complemento').val(endereco.complemento)
            }
        })
    });
    
</script>
