<?php

namespace App\Repositories;
use App\Models\Responsavel;

class ResponsavelRepository {

    protected $responsavel;

    function __construct(Responsavel $responsavel){
        $this->responsavel = $responsavel;
    }

    public function responsaveis()
    {
        return $this->responsavel->all();
    }

    public function responsavelPorId($id)
    {
        return $this->responsavel->find($id);
    }

    public function novoResponsavel($dados)
    {
        return $this->responsavel->create($dados);
    }
    
    public function editarResponsavel($responsavel,array $dados)
    {
        $responsavel->update($dados);
    }

    public function deletarResponsavel($responsavel)
    {
        $responsavel->delete();
    }
}