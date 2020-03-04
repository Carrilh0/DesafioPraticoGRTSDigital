<?php

namespace App\Repositories;
use App\Models\Endereco;

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

    public function novoEndereco($dados)
    {
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