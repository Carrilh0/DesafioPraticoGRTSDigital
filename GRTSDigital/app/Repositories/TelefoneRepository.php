<?php

namespace App\Repositories;
use App\Models\Telefone;

class TelefoneRepository {

    protected $telefone;

    function __construct(Telefone $telefone){
        $this->telefone = $telefone;
    }

    public function telefones()
    {
        return $this->telefone->all();
    }

    public function telefonePorId($id)
    {
        return $this->telefone->find($id);
    }

    public function novoTelefone($dados)
    {
        return $this->telefone->create($dados);
    }
    
    public function editarTelefone($telefone,array $dados)
    {
        $telefone->update($dados);
    }

    public function deletarTelefone($telefone)
    {
        $telefone->delete();
    }
}