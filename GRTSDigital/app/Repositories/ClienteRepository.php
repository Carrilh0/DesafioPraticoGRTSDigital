<?php

namespace App\Repositories;
use App\Models\Cliente;

class ClienteRepository {

    protected $cliente;

    function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function clientes()
    {
        return $this->cliente->all();
    }

    public function clientePorId($id)
    {
        return $this->cliente->find($id);
    }

    public function novoCliente($dados)
    {
        return $this->cliente->create($dados);
    }
    
    public function editarCliente($cliente, array $dados)
    {
        $cliente->update($dados);
    }

    public function deletarCliente($cliente)
    {
        $cliente->delete();
        $cliente->responsavel()->delete();
    }
}