<?php

namespace App\Repositories;
use App\Models\Empresa;

class EmpresaRepository {

    protected $empresa;

    function __construct(Empresa $empresa){
        $this->empresa = $empresa;
    }

    public function empresas()
    {
        return $this->empresa->all();
    }

    public function empresaPorId($id)
    {
        return $this->empresa->find($id);
    }

    public function novoEmpresa($dados)
    {
        return $this->empresa->create($dados);
    }
    
    public function editarEmpresa($empresa, array $dados)
    {
        $empresa->update($dados);
    }

    public function deletarEmpresa($empresa)
    {
        $empresa->delete();
    }
}