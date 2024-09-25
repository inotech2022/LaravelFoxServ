<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarContratoController extends Controller
{
    public function index()
    {
        return view('editarContrato'); // View para o formulário de cadastro
    }
}
