<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\Repositories\ResponsavelRepository;
use App\Repositories\EnderecoRepository;
use App\RequestsValidation\ClienteValidation;
use Auth;

class ClienteController extends Controller
{
    protected $clienteRepository;
    protected $responsavelRepository;
    protected $enderecoRepository;
    protected $clienteValidation;
    protected $request;
    
    function __construct(
        ClienteRepository $clienteRepository,
        ResponsavelRepository $responsavelRepository,
        EnderecoRepository $enderecoRepository, 
        Request $request,
        ClienteValidation $clienteValidation)
    {
        $this->clienteRepository = $clienteRepository;
        $this->responsavelRepository = $responsavelRepository;
        $this->enderecoRepository = $enderecoRepository;
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
        $todosOsDados = $this->request->all();
        $dadosResponsavel = $this->request->only('email','telefone');
        $dadosCliente = $this->request->only('cnpj','nome');
        $dadosEndereco = $this->request->only('cep','estado','cidade','bairro','logradouro','complemento','numero');

        //Validação
        $validate = $this->clienteValidation->validator($todosOsDados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $dadosResponsavel['nome'] = $this->request->input('responsavel');
        $responsavel = $this->responsavelRepository->novoResponsavel($dadosResponsavel);

        $dadosCliente['responsavel_id'] = $responsavel->id;
        $dadosCliente['user_id'] = Auth::user()->id;
        $cliente = $this->clienteRepository->novoCliente($dadosCliente);
        
        $dadosEndereco['cliente_id'] = $cliente->id;
        $dadosEndereco['principal'] = 1;
        $this->enderecoRepository->novoEndereco($dadosEndereco);

        return redirect()->back();
    }

    public function editarCliente()
    {
        $todosOsDados = $this->request->all();
        $dadosResponsavel = $this->request->only('idResponsavel','email','telefone');
        $dadosCliente = $this->request->only('idCliente','cnpj','nome');
        $dadosEndereco = $this->request->only('idEndereco','cep','estado','cidade','bairro','logradouro','complemento','numero');

        //Validação
        $validate = $this->clienteValidation->validator($todosOsDados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $dadosResponsavel['nome'] = $this->request->input('responsavel');
        $responsavel = $this->responsavelRepository->responsavelPorId($dadosResponsavel['idResponsavel']);
        $this->responsavelRepository->editarResponsavel($responsavel,$dadosResponsavel);

        $dadosCliente['user_id'] = Auth::user()->id;
        $cliente = $this->clienteRepository->clientePorId($dadosCliente['idCliente']);
        $this->clienteRepository->editarCliente($cliente,$dadosCliente);
        
        $endereco = $this->enderecoRepository->enderecoPorId($dadosEndereco['idEndereco']);
        $this->enderecoRepository->editarEndereco($endereco,$dadosEndereco);

        return redirect()->back();
    }

    public function removerCliente()
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
