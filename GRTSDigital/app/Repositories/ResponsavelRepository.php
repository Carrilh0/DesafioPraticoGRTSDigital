<?php

namespace App\Repositories;
use App\Models\Reponsavel;

class ReponsavelRepository {

    protected $reponsavel;

    function __construct(Reponsavel $reponsavel){
        $this->reponsavel = $reponsavel;
    }

    public function reponsavels()
    {
        return $this->reponsavel->all();
    }

    public function reponsavelPorId($id)
    {
        return $this->reponsavel->find($id);
    }

    public function novoReponsavel($dados)
    {
        return $this->reponsavel->create($dados);
    }
    
    public function editarReponsavel($reponsavel,array $dados)
    {
        $reponsavel->update($dados);
    }

    public function deletarReponsavel($reponsavel)
    {
        $reponsavel->delete();
    }
}