<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroContratoController extends Controller
{
    public function create()
    {
        return view('cadastroContrato'); // View para o formulário de cadastro
    }
}
