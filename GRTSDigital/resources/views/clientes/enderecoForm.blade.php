
<form method="post" action="{{route('cadastrar_endereco')}}">
    @csrf
    <input type="text" id="cliente_id" name="cliente_id" value="{{$clienteId}}" hidden>

    <div class="row">
        <div style="margin-top: 10px"class="col-md-12">
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="00.000-00"
                     required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estado" name="estado" class="form-control"
                     required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control"
                     required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control"
                     required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Logadouro</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control"
                  required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Complemento</label>
                <input type="text" id="complemento" name="complemento" class="form-control"
                    required>
            </div>
        </div>



        <div class="col-md-2">
            <div class="form-group">
                <label>Nº</label>
                <input type="text" id="numero" name="numero" class="form-control"
                    >
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
                $('#estado').val(endereco.uf)
                $('#cidade').val(endereco.localidade)
                $('#bairro').val(endereco.bairro)
                $('#logradouro').val(endereco.logradouro)
                $('#complemento').val(endereco.complemento)
            }
        })
    });
    
</script>
