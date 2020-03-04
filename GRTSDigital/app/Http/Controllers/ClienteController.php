<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\RequestsValidation\ClienteValidation;

class ClienteController extends Controller
{
    public function index()
    {
        return view('clientes.index');
    }
    
}
