<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use App\RequestsValidation\UsuarioValidation;


class UsuarioController extends Controller
{
    protected $usuarioRepository;
    protected $usuarioValidation;
    protected $request;
    
    function __construct(UsuarioRepository $usuarioRepository, Request $request,UsuarioValidation $usuarioValidation)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->usuarioValidation = $usuarioValidation;
        $this->request = $request;
    }

    public function index()
    {
        $usuarios = $this->usuarioRepository->usuarios();
        return view('usuarios.index',compact('usuarios'));
    }

    public function cadastrarUsuario()
    {
        $dados = $this->request->all();
        $dados['password'] = bcrypt($this->request->input('password'));
        
        //Validação
        $validate = $this->usuarioValidation->validator($dados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $this->usuarioRepository->novoUsuario($dados);
        return redirect()->back();
    }

    public function editarUsuario()
    {
        $dados = $this->request->all();
        $dados['password'] = bcrypt($this->request->input('password'));

        //Validação
        $validate = $this->usuarioValidation->validator($dados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        
        $usuario = $this->usuarioRepository->usuarioPorId($this->request->input('id'));
        $this->usuarioRepository->editarUsuario($usuario,$dados);
        return redirect()->back();
    }

    public function removerUsuario()
    {   
        $usuario = $this->usuarioRepository->usuarioPorId($this->request->input('id'));
        $this->usuarioRepository->deletarUsuario($usuario);
        
        return redirect()->back();
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
