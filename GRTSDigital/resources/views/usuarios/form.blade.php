<form method="post" action="{{route('cadastrar_usuario')}}">
@csrf

<input type="text" id="id" name="id" hidden value="{{isset($usuario) ? $usuario->id : '' }}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Insira o seu nome" value="{{isset($usuario) ? $usuario->nome :  ''}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Insira seu email" value="{{isset($usuario) ? $usuario->email : ''}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Senha</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Insira sua senha" value="">
        </div>
    </div>
</div>

<div class="col-md-12" style="text-align:right">
	<button type="submit" class="btn btn-success" id="salvar-usuario" style="float-right">Salvar</button>
</div>

<form>
