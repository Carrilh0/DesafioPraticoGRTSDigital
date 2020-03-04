<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;

class UsuarioController extends Controller
{
    protected $usuarioRepository;
    
    function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function index()
    {
        $usuarios = $this->usuarioRepository->usuarios();
        return view('usuarios.index',compact('usuarios'));
    }

    public function formularioCadastrarEditar($id = false)
    {
        $usuario = null;
        if($id){
            $usuario = $this->usuarioRepository->usuarioPorId($id);
        }

        return view('usuarios.form',compact('usuario'));
    }
}
