<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\RequestsValidation\ClienteValidation;

class ClienteController extends Controller
{
    protected $clienteRepository;
    protected $clienteValidation;
    protected $request;
    
    function __construct(ClienteRepository $clienteRepository, Request $request,ClienteValidation $clienteValidation)
    {
        $this->clienteRepository = $clienteRepository;
        $this->clienteValidation = $clienteValidation;
        $this->request = $request;
    }
    public function index()
    {
        $clientes = $this->clienteRepository->clientes();

        return view('clientes.index',compact('clientes'));
    }

    public function cadastrarCliente()
    {
        $dados = $this->request->all();
        dd($dados);
        //Validação
        $validate = $this->ClienteValidation->validator($dados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $this->clienteRepository->novoCliente($dados);
        return redirect()->back();
    }

    public function editarCliente()
    {
        $dados = $this->request->all();

        //Validação
        $validate = $this->clienteValidation->validatorUpdate($dados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        
        $cliente = $this->clienteRepository->clientePorId($this->request->input('id'));
        $this->clienteRepository->editarCliente($cliente,$dados);
        return redirect()->back();
    }

    public function removercliente()
    {   
        $cliente = $this->clienteRepository->clientePorId($this->request->input('id'));
        $this->clienteRepository->deletarCliente($cliente);
        
        return redirect()->back();
    }

    public function formularioCadastrarEditar($id = false)
    {
        $cliente = null;
        if($id){
            $cliente = $this->clienteRepository->clientePorId($id);
        }

        return view('clientes.form',compact('cliente'));
    }
    
}
