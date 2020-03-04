<?php

namespace App\Repositories;
use App\Models\User;

class UsuarioRepository {

    protected $user;

    function __construct(User $user){
        $this->user = $user;
    }

    public function usuarios()
    {
        return $this->user->all();
    }

    public function usuarioPorId($id)
    {
        return $this->user->find($id);
    }

    public function novoUsuario($dados)
    {
        return $this->user->create($dados);
    }
    
    public function editarUsuario($usuario,array $dados)
    {
        $usuario->update($dados);
    }

    public function deletarUsuario($usuario)
    {
        $usuario->delete();
    }
}