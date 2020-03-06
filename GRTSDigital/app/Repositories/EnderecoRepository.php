<?php

namespace App\Repositories;
use App\Models\Endereco;
use Auth;

class EnderecoRepository {

    protected $endereco;

    function __construct(Endereco $endereco){
        $this->endereco = $endereco;
    }

    public function enderecos()
    {
        return $this->endereco->all();
    }

    public function enderecoPorId($id)
    {
        return $this->endereco->find($id);
    }

    public function enderecosAleternativos($id)
    {
        return $this->endereco->where('principal',0)->where('cliente_id', $id)->get();
    }
    public function novoEnderecoAleternativos($dados)
    {
        $dados['cliente_id'] = Auth()->user()->id;
        $dados['principal'] = 0;
        return $this->endereco->create($dados);    }

    public function novoEndereco($dados)
    {
        $dados['cliente_id'] = Auth()->user()->id;
        $dados['principal'] = 1;
        return $this->endereco->create($dados);
    }
    
    public function editarendereco($endereco,array $dados)
    {
        $endereco->update($dados);
    }

    public function deletarEndereco($endereco)
    {
        $endereco->delete();
    }
}