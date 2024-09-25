<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroProfissionalController extends Controller
{
    public function create()
    {
        return view('cadastroProfissional'); // View para cadastro de profissionais
    }
}
